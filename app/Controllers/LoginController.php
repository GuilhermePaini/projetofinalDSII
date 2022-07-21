<?php

namespace App\Controllers;

use App\Models\User as UserModel;
class LoginController extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn'))
        {
            return redirect()->to('/home');
        }

        return view('/login/login');
    }

    public function logout() {
        session()->set(['isLoggedIn' => FALSE]);
        return redirect()->to('/login');
    }

    public function login() {
        $session = session();
        $usermodel = model(UserModel::class);

        $request = $this->request->getPost();

        $data = $usermodel->where('email', $request['email'])->first();

        if($data) {
            $pass = $data['password'];
            
            if($request['password'] === $pass) {

                $session_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE,
                ];

                $session->set($session_data);
                return redirect()->to('/home');
            }

            session()->setFlashdata('error', ['Password invalid!']);
            return redirect()->back();
        }

        session()->setFlashdata('error', ['Username or password incorrect!']);
        return redirect()->back();
    }
}
