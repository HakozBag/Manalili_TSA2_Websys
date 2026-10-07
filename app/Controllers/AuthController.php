<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        // If already logged in, redirect to tasks
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/tasks');
        }
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'id'         => $user['id'],
                    'username' => $user['username'],
                    'name'     => $user['name'] ?? $user['username'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);
                return redirect()->to('/tasks')->with('success', 'Logged in successfully!');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
    }

    public function register()
    {
        // If already logged in, redirect to tasks
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/tasks');
        }
        return view('auth/register');
    }

    public function attemptRegister()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            // Automatically securely hashes the password
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        $userModel->save($data);

        return redirect()->to('/login')->with('success', 'Account created successfully! You can now log in.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Logged out successfully.');
    }
}