<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CaseTypesModel;
use App\Models\CaseCategoriesModel;
use App\Models\UserModel;
use App\Models\PendingCasesModel;


class LawyerController extends BaseController
{
    public function __construct(){
        if (session()->get('role') != 2) {
            echo 'Access denied';
            exit;
        }
    }
    public function lawyer()
    {
        return view('Lawyer/lawyersdash');
    }
    public function viewCase()
    {
        $user = new UserModel();
        $users = $user->getAllUsers();
        session()->set('users', $users);

        $pending = new PendingCasesModel();
        $pending = $pending->getAllPendingCases();
        session()->set('pending', $pending);
        return view('Lawyer/recommendedCases');
    }

    public function takeCase($catid=0){
      

            $pendingCases = new PendingCasesModel();
            $pendingCases->takeCase($catid);
            return redirect()->to('http://localhost:8080/recommendedCases');
    
        
    }
    public function takenCases()
    {
        $user = new UserModel();
        $users = $user->getAllUsers();
        session()->set('users', $users);

        $takenCases = new PendingCasesModel();
        $result = $takenCases->getAllPendingCases();
        session()->set('takenCases', $result);
        return view('Lawyer/takenCases');
    }
    public function cancelCase($catid=0){

        $pendingCases = new PendingCasesModel();
        $pendingCases->cancelCase($catid);
        return redirect()->to('http://localhost:8080/takenCases');

    }
    public function profilePage($cid=0){
        $user = new UserModel();
        $lawyerp = $user->getUserWhere((['ID' => $cid]));
        session()->set('lawyerDetails', $lawyerp);
        return view('Lawyer/profile');
        
    }
    public function editProfileLawyer($cid=0){
        $user = new UserModel();
        $lawyerp = $user->getUserWhere((['ID' => $cid]));
        session()->set('lawyerD', $lawyerp);
        return view('Lawyer/updateProfile');
        
    }

    public function updateProfileLawyer($cid=0){

        $data = [
            'First_Name' => $this->request->getPost('First_Name'),
            'Last_Name' => $this->request->getPost('Last_Name'),
            'Email' => $this->request->getPost('Email'),
            'Description' => $this->request->getPost('Description'),
            'password' => $this->request->getPost('password_1'),
           
        ];
        $userModel = new UserModel();
        $userModel->updateProfile($cid,$data);
        session()->set($data);
        return redirect()->to('/lawyer');

    }

}
