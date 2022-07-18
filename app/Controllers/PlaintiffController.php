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

        if ($this->request->isAJAX()) {
            $data = [
                'lawyerid' => session()->get('lawyerid'),
                'Comments' => $this->request->getPost('user_review'),
            ];
            dd($data);
        }
        
        //if($this->request->getMethod() == 'post'){
            // $data = [
            //     'lawyerid' => session()->get('lawyerid'),
            //     'Comments' => $this->request->getPost('user_review'),
            // ];
            // dd($data);
        //}
        //dd($data);
        // if ($this->request->isAJAX()) {
        //     $prodID = service('request')->getPost('user_name');
            
        //     $data = [
        //         'lawyerid' => session()->get('lawyerid'),
        //         'Comments' => $this->request->getPost('First_Name')
        //     ];
          
        // } 
        // dd($prodID);

        //$ratings = new RatingModel();
       // $ratings->saveData($data);

    }

}