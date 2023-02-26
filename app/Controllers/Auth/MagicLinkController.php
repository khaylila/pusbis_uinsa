<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use CodeIgniter\Shield\Controllers\MagicLinkController as ShieldMagicLinkController;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Shield\Models\UserIdentityModel;

class MagicLinkController extends ShieldMagicLinkController
{
    use ResponseTrait;
    /**
     * Displays the view to enter their email address
     * so an email can be sent to them.
     *
     * @return RedirectResponse|string
     */
    public function forgotPasswordView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        return $this->view('auth/forgot', [
            'title' => 'Forgot Password',
            'scripts' => ["./js/forgotpassword.js"],
        ]);
    }

    /**
     * Receives the email from the user, creates the hash
     * to a user identity, and sends an email to the given
     * email address.
     */
    public function forgetAct()
    {
        // Validate email format
        $rules = $this->getValidationRules();
        if (!$this->validate($rules)) {
            // return redirect()->route('magic-link')->with('errors', $this->validator->getErrors());
            return $this->fail($this->validator->getErrors());
        }

        // Check if the user exists
        $email = $this->request->getPost('email');
        $user  = $this->provider->findByCredentials(['email' => $email]);

        if ($user === null) {
            return $this->fail(lang('Auth.invalidEmail'));
        }

        // Generate new password and save
        helper('text');
        $password = random_string('alnum', 16);

        $users = $this->provider;

        $user->fill([
            'password' => $password
        ]);

        try {
            $users->save($user);
        } catch (ValidationException $e) {
            log_message('errors', json_encode($users->errors()));
            return $this->failServerError();
        }

        // Send the user an email with the code
        $email = emailer()->setFrom(setting('Email.fromEmail'), setting('Email.fromName') ?? '');
        $email->setTo($user->email);
        $email->setSubject("Pusbis Client Reset Password");
        $email->setMessage($this->view('auth/emailNewPass', [
            'email' => 'Your current email',
            'password' => $password
        ]));

        if ($email->send(false) === false) {
            log_message('error', $email->printDebugger(['headers']));

            // return redirect()->route('magic-link')->with('error', lang('Auth.unableSendEmailToUser', [$user->email]));
            return $this->fail(lang('Auth.unableSendEmailToUser', [$user->email]));
        }

        // Clear the email
        $email->clear();

        return $this->respond(['status' => 'Success send new email', 'messages' => "Check your email inbox for the new password", 'url' => config('Auth')->loginRedirect(), 'httpCode' => 308], 308);
    }
}
