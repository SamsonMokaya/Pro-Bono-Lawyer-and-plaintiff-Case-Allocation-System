<?php

namespace App\Models;
use CodeIgniter\Model;

class RatingModel extends Model{
    protected $allowedFields=[	'ID',	'LawyerId',	'Rating','datetime','Comments'];
    protected $primaryKey='id';
    protected $table='Ratings';
    protected $db,$builder;
    
    function __construct(){
        $db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function saveData($data){
      $this->builder->insert($data);
    }
    
}

?>