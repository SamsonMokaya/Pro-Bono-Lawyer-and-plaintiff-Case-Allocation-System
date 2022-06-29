<?php

namespace App\Models;
use CodeIgniter\Model;

class CaseCategoriesModel extends Model{
    protected $allowedFields=['ID', 'Case_Category','CaseType'];
    protected $primaryKey='ID';
    protected $table='CaseCategories';
    protected $db, $builder;

    function __construct(){
        $db=\Config\Database::connect();
        $this->builder=$db->table($this->table);
    }
    public function getcasetypeWhere($condition){
        $result = $this->builder->where($condition)->get()->getResultArray();    
       if(empty($result)) {
         return false;
         }
         return $result;
     }


}

?>