<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        // Get the request object
        $request = service('request');

        // Check if the form is submitted
        if ($request->getMethod() === 'post') {
            // Retrieve the submitted login credentials
            $username = $request->getPost('username');
            $password = $request->getPost('password');

            if ($this->validateCredentials($username, $password)) {
                // Successful login, set session or redirect to the dashboard
                return redirect()->to('/dashboard');
            } else {
                // Failed login, show error message or redirect to the login page
                return redirect()->to('user/login')->with('error', 'Invalid username or password');
            }
        }

        // Show the login form
        return view('user/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    private function validateCredentials($email, $password)
    {
        $db = db_connect();
    
        // Query the 'pengguna' table to validate the credentials
        $query = $db->table('pengguna')
                    ->where('email', $email)
                    ->where('password', $password)
                    ->get();
    
        $result = $query->getRow();
    
        // Check if a matching record is found
        if ($result !== null) {
            return true; // Valid credentials
        } else {
            return false; // Invalid credentials
        }
    }

    public function register()
    {
        $request = service('request');

        // Check if the form is submitted
        if ($request->getMethod() === 'post') {
            // Retrieve the submitted form data
            $username = $request->getPost('username');
            $email = $request->getPost('email');
            $password = $request->getPost('password');

            // Validate the input data
            $validation = $this->validate([
                'username' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
            ]);

            // If validation fails, redirect back to the registration form with validation errors
            if (!$validation) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Create a new user record in the database
            $userModel = new UserModel();
            $userModel->save([
                'username' => $username,
                'email' => $email,
                'password' => $hashedPassword,
            ]);

            // If registration is successful, redirect to the login page or show a success message
            return redirect()->to('/login')->with('success', 'Registration successful!');
        }

        // Show the registration form
        return view('user/register');
    }
}    