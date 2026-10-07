<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $username = trim($this->request->getPost('username'));
            $password = $this->request->getPost('password');

            $user = $this->userModel
                ->where('username', $username)
                ->first();

            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'isLoggedIn' => true
                ]);

                return redirect()->to('/tasks');
            }

            return redirect()->back()
                ->with('error', 'Invalid username or password.')
                ->withInput();
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}