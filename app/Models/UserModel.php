<?php

namespace App\Models;
use CodeIgniter\Model;
//use Config\Database;

class UserModel extends Model{
    protected $allowedFields=['ID','First_Name','Last_Name', 'Email','password','role','profile'];
    protected $primaryKey='ID';
    protected $table='Users';
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $db,$builder;
    
    function __construct(){
        $db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    protected function beforeInsert(array $data){
      $data = $this->passwordHash($data);
  
      return $data;
    }
  
    protected function beforeUpdate(array $data){
      $data = $this->passwordHash($data);
  
      return $data;
    }
  
    protected function passwordHash(array $data){
      if(isset($data['data']['password']))
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
  
      return $data;
    }

    public function saveData($data){
      $this->builder->insert($data);
    }

    public function getAllUsers(){
        return $this->builder->get()->getResultArray();
    }
    public function getUserWhere($condition){
       $result = $this->builder->where($condition)->get()->getResultArray();
      if(empty($result)) {
        return false;
        }
        return $result[0];
    }
    public function getUsersWhere($condition){
      $result = $this->builder->where($condition)->get()->getResultArray();
     if(empty($result)) {
       return false;
       }
       return $result;
   }
   public function updateProfile($id,$data){
    $this->builder->set($data)
              ->where('id', $id)
              ->update();
}
    
}

?>