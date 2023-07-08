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
            $email = $request->getPost('email');
            $password = $request->getPost('password');
            $session = session();

            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();
            if ($user) {
                $pass = $user['password'];
                if (is_array($password)) {
                    $password = $password['password'];
                }

                if (password_verify($password, $pass)) {
                    $login_data = [
                        'user_id' => $user['id'],
                        'user_name' => $user['name'],
                        'user_email' => $user['email'],
                        'logged_in' => true,
                    ];
                    $session->set($login_data);
                    return redirect()->to(base_url('user/dashboard'));
                } else {
                    $session->setFlashData("errors", "Password salah");
                    return redirect()->to(base_url('user/login'));
                }
            } else {
                $session->setFlashData("errors", "Email tidak terdaftar");
                return redirect()->to(base_url('user/login'));
            }

        }

        // Show the login form
        return view('user/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('user/login'));
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
            $username = $request->getPost('name');
            $email = $request->getPost('email');
            $password = $request->getPost('password');
            
            // Validate the input data
            $validation = $this->validate([
                'name' => 'required',
                'email' => 'required|valid_email|is_unique[pengguna.email]',
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
                'name' => $username,
                'email' => $email,
                'password' => $hashedPassword,
            ]);

            // If registration is successful, redirect to the login page or show a success message
            return redirect()->to(base_url('user/login'))->with('success', 'Registration successful!');
        }

        // Show the registration form
        return view('user/register');
    }
}    