<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function __construct(){
        if (session()->get('role') != 1) {
            echo 'Access denied';
            exit;
        }
    }
    public function admin()
    {
        return view('Admin/admin');
    }
    public function getAllLawyers(){
        $user = new UserModel();
        $lawyers = $user->getUsersWhere((['role' => 2]));
        session()->set('lawyers', $lawyers);
        return view('Admin/lawyers');
    }
    public function getAllPlaintiffs(){
        $user = new UserModel();
        $plaintiffs = $user->getUsersWhere((['role' => 3]));
        session()->set('plaintiffs', $plaintiffs);
        return view('Admin/plaintiffs');
    }

}
