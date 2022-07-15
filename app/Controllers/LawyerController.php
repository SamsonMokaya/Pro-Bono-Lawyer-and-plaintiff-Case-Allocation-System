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
    public function deleteCase($catid=0){

        $pendingCases = new PendingCasesModel();
        $pendingCases->deleteCase($catid);
        return redirect()->to('http://localhost:8080/takenCases');

    }

}
