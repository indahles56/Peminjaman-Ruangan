<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
                return redirect()->to('/login')->with('error', 'Invalid username or password');
            }
        }

        // Show the login form
        return view('login');
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
        $query = $db->table('admin')
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

    public function register(){}

}    