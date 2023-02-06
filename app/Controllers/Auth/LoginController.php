<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use CodeIgniter\Shield\Controllers\LoginController as ShieldLoginController;
use CodeIgniter\API\ResponseTrait;

class LoginController extends ShieldLoginController
{
    use ResponseTrait;
    /**
     * Displays the form the login to the site.
     *
     * @return RedirectResponse|string
     */
    public function loginView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        return $this->view('auth/login', [
            'title' => 'Login'
        ]);
    }
    /**
     * Attempts to log the user in.
     */

    public function loginAct()
    {
        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $credentials             = $this->request->getPost(setting('Auth.validFields'));
        $credentials             = array_filter($credentials);
        $credentials['password'] = $this->request->getPost('password');
        $remember                = (bool) $this->request->getPost('remember');

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // Attempt to login
        $result = $authenticator->remember($remember)->attempt($credentials);
        if (!$result->isOK()) {
            return $this->failUnauthorized($result->reason());
            // return redirect()->route('login')->withInput()->with('error', $result->reason());
        }

        // If an action has been defined for login, start it up.
        // if ($authenticator->hasAction()) {
        //     return redirect()->route('auth-action-show')->withCookies();
        // }


        return $this->respond(['status' => 'Succes login', 'url' => base_url('/dashboard'), 'httpCode' => 200], 200);
    }
}
