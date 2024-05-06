<?php

namespace App\Controllers;

use App\Models\User as UserModel;
use CodeIgniter\Controller;

class UserController extends BaseController
{ public function login()
    {
        $session = session();

        // Check if user is already logged in
        if ($session->isLoggedIn) {
            return redirect()->to(base_url('/'));
        }
        return view('login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }public function processLogin()
    {
        $session = session();
    
        // Get user input
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        // dd($password);
        // Validate user credentials
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
        // dd($user['password']);
        
        if ($user) {
                // Set session data
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'isLoggedIn' => true
                ]);
    
                // Redirect to the previously requested URL or homepage
                $redirect_url = $session->get('redirect_url') ?? '/';
                $session->remove('redirect_url');
                // dd($session->username);
                return redirect()->to(base_url($redirect_url));
                // Incorrect password
        } else {
            // User not found
            return redirect()->back()->withInput()->with('error', 'User not found');
        }
    }
    
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('users', $data); 
    } public function add()
    {
        $userModel = new UserModel();
        
        $password = $this->request->getVar('password');
        // dd($password);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $data = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $hashedPassword
        ];
    
        $userModel->insert($data);
    
        return redirect()->to(base_url('users'))->with('success', 'Data berhasil ditambahkan!');
    }public function edit($id)
    {
        $userModel = new UserModel();

        // Fetch user data by ID
        $user = $userModel->find($id);
        // dd($id);
        if (!$user) {
            return redirect()->to(base_url('users '))->with('error', 'User tidak ditemukan!');
        }
        $password = $this->request->getVar('password');
        // dd($password);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Update user data
        $data = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $hashedPassword
        ];

        $userModel->update($id, $data);

        return redirect()->to(base_url('users '))->with('success', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
        $userModel = new UserModel();

        // Fetch user data by ID
        $user = $userModel->find($id);

        if (!$user) {
           return redirect()->to(base_url('users '))->with('error', 'User tidak ditemukan!');
        }

        // Delete user
        $userModel->delete($id);

       return redirect()->to(base_url('users '))->with('success', 'Data berhasil dihapus!');
    }
}
