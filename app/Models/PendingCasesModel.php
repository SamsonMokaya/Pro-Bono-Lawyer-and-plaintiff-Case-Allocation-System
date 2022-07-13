<?php

namespace App\Models;
use CodeIgniter\Model;

class PendingCasesModel extends Model{
    protected $allowedFields=['id','civilianid','casetype', 'casecategory','status','lawyerid','Approval','is_deleted'];
    protected $primaryKey='id';
    protected $table='pendingcases';
    protected $db,$builder;
    
    function __construct(){
        $db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function saveData($data){
      $this->builder->insert($data);
    }

    public function getAllPendingCases(){
        return $this->builder->get()->getResultArray();
    }
    public function getUserWhere($condition){
       $result = $this->builder->where($condition)->get()->getResultArray();
      if(empty($result)) {
        return false;
        }
        return $result[0];
    }
    public function deleteCase($id){
        $this->builder->set('is_deleted', 1)
                  ->where('id', $id)
                  ->update();
    }
    
}

?>