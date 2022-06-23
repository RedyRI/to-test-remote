<?php

namespace App\Models;

use CodeIgniter\Model;

class m_programas extends Model
{
  function __construct(){
    // Call the Model constructor
		parent::__construct();
  }
  protected $table = 'j_gallery_temasdia';
  public function getProgramas()
  {
    return $this->findAll();
  }
  
  public function getProgramasPana()
  {
    $DB2 = $this->load->database('dbpana', TRUE);
     $DB2->select('*');
     $DB2->from('j_gallery_temasdia');
      $query =$DB2->get();
      return  $query->result();
    }
}