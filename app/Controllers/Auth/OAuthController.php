<?php

declare(strict_types=1);

/**
 * This file is part of Shield OAuth.
 *
 * (c) Datamweb <pooya_parsa_dadashi@yahoo.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers\Auth;

use App\Models\OwnUserModel;
use CodeIgniter\Shield\Entities\User;
use Datamweb\ShieldOAuth\Controllers\OAuthController as ShieldOauth;

class OAuthController extends ShieldOauth
{
    public function redirectOAuth(string $oauthName)
    {
        // if user login
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        // https://stackoverflow.com/questions/71909552/still-same-error-display-curl-error-60-ssl-certificate-problem-unable-to-get
        if (config('ShieldOAuthConfig')->changeOauthConfig()->oauthConfigs[$oauthName]['allow_login'] === false) {
            $errorText = 'ShieldOAuthLang.' . ucfirst($oauthName) . '.not_allow';

            return redirect()->to(config('Auth')->logoutRedirect())->with('error', lang($errorText));
        }

        session()->set('oauth_name', $oauthName);

        // Loading the class according to oauthName choices
        $oauthClass = service('ShieldOAuth')::setOAuth($oauthName);

        // Run anti forgery
        $state = $this->makeAntiForgeryKey();

        $redirectLink = $oauthClass->makeGoLink($state);

        return redirect()->to($redirectLink);
    }

    public function callBack()
    {
        // if user after callback request url
        if (!session('oauth_name')) {
            return redirect()->to(config('Auth')->logoutRedirect())->with('error', lang('ShieldOAuthLang.Callback.oauth_class_not_set'));
        }
        $allGet = $this->request->getGet();

        // if api have error
        if (isset($allGet['error'])) {
            return redirect()->to(config('Auth')->logoutRedirect())->with('error', lang('ShieldOAuthLang.unknown'));
        }
        // Loading the class according to oauthName choices
        $oauthName  = session()->get('oauth_name');
        $oauthClass = service('ShieldOAuth')::setOAuth($oauthName);

        // check request is Forgery
        if ($this->checkAntiForgery($allGet['state']) === false) {
            return redirect()->to(config('Auth')->logoutRedirect())->with('error', lang('ShieldOAuthLang.Callback.anti_forgery'));
        }

        // Delete to prevent reuse
        session()->remove(['state', 'oauth_name']);

        $userInfo = $oauthClass->getUserInfo($allGet);

        $find = ['email' => $userInfo->email];

        if ($this->checkExistenceUser($find) === true) {
            $updateFildes = $oauthClass->getColumnsName('syncingUserInfo', $userInfo);

            $userid = $this->syncingUserInfo($find, $updateFildes);
        }

        if ($this->checkExistenceUser($find) === false) {
            helper('text');
            $users = model(OwnUserModel::class);
            // new user
            $entitiesUser = new User($oauthClass->getColumnsName('newUser', $userInfo));

            $users->save($entitiesUser);
            $userid = $users->getInsertID();
            // To get the complete user object with ID, we need to get from the database
            $user = $users->findById($userid);
            $users->save($user);
            // Add to default group
            $users->addToDefaultGroup($user);
        }

        auth()->loginById($userid);
        $this->recordLoginAttempt($oauthName, $userInfo->email);

        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        return redirect()->to(config('Auth')->logoutRedirect())->with('error', lang('ShieldOAuthLang.unknown'));
    }

    private function makeAntiForgeryKey(): string
    {
        helper('text');
        $state = random_string('crypto', 40);

        session()->set('state', $state);

        return $state;
    }

    private function checkAntiForgery(string $state): bool
    {
        return (bool) ($state === session()->get('state'));
    }

    private function checkExistenceUser(array $find = []): bool
    {
        $users = model(OwnUserModel::class);
        // $find = ['email' => $this->userInfo()->email];
        $findUser = $users->findByCredentials($find);

        return (bool) ($findUser !== null);
    }

    private function syncingUserInfo(array $find = [], array $updateFildes = []): int
    {
        $users = model(OwnUserModel::class);
        $user  = $users->findByCredentials($find);

        $syncingUserInfo = config('ShieldOAuthConfig')->syncingUserInfo;
        if ($syncingUserInfo === true) {
            $user->fill($updateFildes);
        }
        $users->save($user);

        return $user->id;
    }

    private function recordLoginAttempt(string $oauthName = '', string $identifier = ''): void
    {
        $loginModel = model(LoginModel::class);

        $loginModel->recordLoginAttempt(
            $oauthName . '_oauth',
            $identifier,
            true,
            $this->request->getIPAddress(),
            (string) $this->request->getUserAgent(),
            user_id(),
        );
    }
}
