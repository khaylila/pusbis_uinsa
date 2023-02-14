<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegisterController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Events\Events;
use CodeIgniter\API\ResponseTrait;

/**
 * Class RegisterController
 *
 * Handles displaying registration form,
 * and handling actual registration flow.
 */
class RegisterController extends ShieldRegisterController
{
    use ResponseTrait;

    /**
     * Displays the registration form.
     *
     * @return RedirectResponse|string
     */
    public function registerView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->registerRedirect());
        }

        // Check if registration is allowed
        if (!setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        return $this->view('auth/register', [
            'title' => 'Register'
        ]);
    }

    /**
     * Attempts to register the user.
     */

    private function generatePassword($length = 16)
    {
        $alpha = "qwertyuiopasdfghjklzxcvbnm";
        $alphaCap = "QWERTYUIOPASDFGHJKLZXCVBNM";
        $num = '1234567890';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $rand = rand(1, 10);
            if ($rand % 3 == 0) {
                $password .= $alpha[rand(0, strlen($alpha) - 1)];
            } else if ($rand % 3 == 2) {
                $password .= $alphaCap[rand(0, strlen($alphaCap) - 1)];
            } else {
                $password .= $num[rand(0, strlen($num) - 1)];
            }
        }

        return $password;
    }

    public function registerAct()
    {
        if (auth()->loggedIn()) {
            return $this->respond([
                'status' => 'redirect',
                'messages' => 'You has been logged in!',
                'url' => config('Auth')->registerRedirect(),
            ], 308);
        }

        // Check if registration is allowed
        if (!setting('Auth.allowRegistration')) {
            return $this->respond([
                'status' => 'access denied',
                'message' => 'Allow register has been disable',
            ], 401);
        }

        $users = $this->getUserProvider();

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        // Save the user
        // $allowedPostFields = array_keys($rules);
        $user              = $this->getUserEntity();

        $password = $this->generatePassword();

        $field = [
            'email' => $this->request->getPost('email'),
            'password' => $password,
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'username' => $this->request->getPost('username'),
            'phone_number' => $this->request->getPost('phone'),
            'address' => serialize([
                'province' => $this->request->getPost('province'),
                'city' => $this->request->getPost('city'),
                'regency' => $this->request->getPost('regency'),
                'district' => $this->request->getPost('district'),
                'address' => htmlspecialchars($this->request->getPost('address')),
            ]),
            'active' => 1,
        ];
        // $user->fill($this->request->getPost($allowedPostFields));
        $user->fill($field);

        // Workaround for email only registration/login
        if ($user->username === null) {
            $user->username = null;
        }

        try {
            $users->save($user);
        } catch (ValidationException $e) {
            log_message('errors', json_encode($users->errors()));
            return $this->failServerError();
        }

        // To get the complete user object with ID, we need to get from the database
        $userID = $users->getInsertID();
        $user = $users->findById($userID);

        // Add to default group
        $users->addToDefaultGroup($user);

        Events::trigger('register', $user);

        /** @var Session $authenticator */
        // $authenticator = auth('session')->getAuthenticator();

        // $authenticator->startLogin($user);

        // // If an action has been defined for register, start it up.
        // $hasAction = $authenticator->startUpAction('register', $user);
        // if ($hasAction) {
        //     return $this->respond(['status' => 'redirect', 'messages' => 'Has Action!', 'url' => 'auth/a/show', 'httpCode' => 308], 308);
        // }

        // // Set the user active
        // $authenticator->activateUser($user);

        // $authenticator->completeLogin($user);

        if (!$this->sendEmail($field, 'Pusbis Client Server login information')) {
            try {
                $users->delete($userID, true);
            } catch (ValidationException $e) {
                log_message('errors', json_encode($users->errors()));
            }
            return $this->respond(['status' => 'server_error', 'messages' => 'Unable to send email!'], 500);
        }

        // Success!
        return $this->respond(['status' => 'Success create account', 'messages' => "Check your email inbox for the password", 'url' => config('Auth')->registerRedirect(), 'httpCode' => 308], 308);
    }

    public function sendEmail($data, $title = 'Pusbis Client Server login information')
    {
        $config['SMTPUser'] = setting('Email.SMTPUser');
        $config['SMTPPass'] = setting('Email.SMTPPass');
        $email = service('email');

        $email->initialize($config);
        $email->setFrom(setting("Email.fromEmail"), setting('Email.fromName'));
        $email->setTo($data['email']);

        $email->setSubject($title);
        $email->setMessage(view('auth/emailNewUser', $data));

        if (!$email->send(false)) {
            log_message('warning', $email->printDebugger(['headers']));
            return false;
        }

        $email->clear();

        return true;
    }
}
