<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }


    public function signup(){
        helper(['form']);

        if($this->request->getMethod() == 'post'){

            $userModel = new UserModel();
             
            $rules = [
                'Email' => 'min_length[7]|max_length[30]|valid_email|is_unique[Users.Email]',
               
            ];
            if(! $this -> validate($rules, )){
                $data['validation'] = $this -> validator;
                return view('signup', $data);
            }else{

                
                
                $userModel->saveData($data);
                $session = session();
                $session -> setFlashdata('success', 'Sucesful registration');
                echo view('signin');
            }
      

        }

        return view('signup');
    }


    public function signin()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'Email' => 'required|min_length[6]|max_length[50]|valid_email|',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[Email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password didn't match",
                ],
            ];
            $model = new UserModel();
            $user = $model->getUserWhere(['Email' => $this->request->getVar('Email')]);

            if (! $this -> validate($rules, $errors)) {
     
                $data['validation'] = $this->validator;
                return view('signin', $data);

            } else {

                $model = new UserModel();


                // Storing session values
                $this->setUserSession($user);
                

                // Redirecting to dashboard after login
                if($user['role'] == 1){
                    return redirect()->to(base_url('admin'));
                }elseif($user['role'] == 2){
                    return redirect()->to(base_url('lawyer'));
                }elseif ($user['role'] == 3) {
                    return redirect()->to(base_url('plaintiff'));
                }
                
            }
        }

        return view('signin');
    }

    public function profile()
    {
        $userModel = new UserModel();
        $data = $userModel->getAllUsers();
        session()->set('data', $data);

        return view('Plaintiff/profile');
    }
    public function editProfileP($cid=0){
        $userModel = new UserModel();
        $userProfile = $userModel->getUserWhere((['ID' => $cid]));
        session()->set('userProfile', $userProfile);
        return view('Plaintiff/updateProfile');
        
    }

    public function updateProfileUser($cid=0){

        $data = [
            'First_Name' => $this->request->getPost('First_Name'),
            'Last_Name' => $this->request->getPost('Last_Name'),
            'Email' => $this->request->getPost('Email'),
            'password' => $this->request->getPost('password_1'),
           
        ];
        $userModel = new UserModel();
        $userModel->updateProfile($cid,$data);
        session()->set($data);
        return redirect()->to('/plaintiff');

    }

    private function setUserSession($user)
    {
        $data = [
            'ID' => $user['ID'],
            'First_Name' => $user['First_Name'],
            'Last_Name' => $user['Last_Name'],
            'Email' => $user['Email'],
            'isLoggedIn' => true,
            "role" => $user['role'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('signin');
    }
}
