<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CaseTypesModel;
use App\Models\CaseCategoriesModel;
use App\Models\UserModel;
use App\Models\PendingCasesModel;
use App\Models\RatingModel;

class PlaintiffController extends BaseController
{
    public function __construct(){
        if (session()->get('role') != 3) {
            echo 'Access denied';
            exit;
        }
    }

    public function Plaintiff()
    {
        return view('Plaintiff/civiliandash');
    }

    public function getAllLawyers(){
        $user = new UserModel();
        $lawyers = $user->getUsersWhere((['role' => 2]));
        session()->set('lawyers', $lawyers);
        return view('Plaintiff/lawyers');
    }
    public function lawyerProfilePage($id=0){
        $user = new UserModel();
        $lawyers = $user->getUserWhere((['ID' => $id]));
        session()->set('plawyer', $lawyers);
        return view('Plaintiff/lawyerprofilepage');
    }
    public function myProfilePage($id=0){
        return view('Plaintiff/profile');
    }

    public function Case()
    {

        $user = new UserModel();
        $lawyers = $user->getAllUsers();
        session()->set('lawyers', $lawyers);
        
        $caseTypes = new CaseTypesModel();
        $caseCategories = $caseTypes->getAllCategories();
        session()->set('caseCategories', $caseCategories);
        return view('Plaintiff/case');
    }

    public function profilePage($cid=0){
        $user = new UserModel();
        $plaintiff = $user->getUserWhere((['ID' => $cid]));
        session()->set('plaintiff', $plaintiff);
        return view('Plaintiff/profile');
        
    }

    public function editProfilePlaintiff($cid=0){
        $user = new UserModel();
        $lawyerp = $user->getUserWhere((['ID' => $cid]));
        session()->set('lawyerD', $lawyerp);
        return view('Lawyer/updateProfile');
        
    }

    public function updateProfilePlaintiff($cid=0){

        

        $file = $this->request->getFile('img');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/assets/images/uploads/', $fileName);
            }
        $data = [
            'First_Name' => $this->request->getPost('First_Name'),
            'Last_Name' => $this->request->getPost('Last_Name'),
            'Email' => $this->request->getPost('Email'),
            'Description' => $this->request->getPost('Description'),
            'password' => $this->request->getPost('password_1'),
            'profile_pic' => $fileName,
           
        ];
        $userModel = new UserModel();
        $userModel->updateProfile($cid,$data);
        session()->set($data);
        return redirect()->to('/lawyer');

    }

    public function completedCase()
    {

        $user = new UserModel();
        $lawyers = $user->getAllUsers();
        session()->set('lawyers', $lawyers);
        
        $pendingCases = new PendingCasesModel();
        $result = $pendingCases->getAllPendingCases();
        session()->set('pendingCases', $result);
        return view('Plaintiff/finishedCases');
    }

    public function getCaseCategoriesWhere($catid=0){
        $caseCategories = new CaseCategoriesModel();     
        $result = $caseCategories->getcasetypeWhere((['CaseType' => $catid]));
        echo json_encode($result);
        
    }
    

    public function registerCase(){ 

        $data = [
            'civilianid' => session()->get('ID'),
            'casetype' => $this->request->getVar('casetype'),
            'casecategory' => $this->request->getVar('casecategory'),
            'status' => $this->request->getVar('status'),
            'lawyerid' => $this->request->getVar('lawyerid'),
        ];

        //dd($data);

        $pendingCases = new PendingCasesModel();
        $pendingCases->saveData($data);
        $session = session();
        $session -> setFlashdata('successr', 'Your case has been received Succesfully. It willbe approved soon');

        return view('Plaintiff/civiliandash');
    }

    public function viewPendingCases(){

        $pendingCases = new PendingCasesModel();
        $result = $pendingCases->getAllPendingCases();
        session()->set('pendingCases', $result);
        return view('Plaintiff/pendingcases');

    }
    public function updateProfileUser($cid=0){

                $file = $this->request->getFile('img');
                if ($file->isValid() && !$file->hasMoved()) {
                    $fileName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/assets/images/uploads/', $fileName);
                    }
                $data = [
                    'First_Name' => $this->request->getPost('First_Name'),
                    'Last_Name' => $this->request->getPost('Last_Name'),
                    'Email' => $this->request->getPost('Email'),
                    'password' => $this->request->getPost('password_1'),
                    'profile_pic' => $fileName,
                ];
                $userModel = new UserModel();
                $userModel->updateProfile($cid,$data);
                session()->set($data);
                return redirect()->to('/plaintiff');
            //}
        

    }
    
    public function deleteCase($catid=0){

        $pendingCases = new PendingCasesModel();
        $pendingCases->deleteCase($catid);
        return redirect()->to('http://localhost:8080/viewPendingCases');

    }
    public function deleteCase2($catid=0){

        $pendingCases = new PendingCasesModel();
        $pendingCases->deleteCase($catid);
        return redirect()->to('http://localhost:8080/completedcases');

    }
    
    public function rating(){

        $data = [
            'lawyerid' => session()->get('lawyerid'),
            'Comments' => $this->request->getPost('user_review'),
            'Rating' => $this->request->getPost('rating'),
        ];
        
    $ratings = new RatingModel();
    $ratings->saveData($data);

    }

}