<?php

namespace App\Models;

use CodeIgniter\Model;

class m_onda extends Model
{
	protected $DBGroup = 'dbonda'; // default database group
  protected $table = 'j_gallery_temasdia';
  
    // Change it for other database group
    // protected $DBGroup  = 'otherDb';
  
	//...
   public function getProgramas()
  {
    return $this->findAll();
  }
}
