<?php

namespace App\Models;

use CodeIgniter\Model;

class m_pana extends Model
{
  protected $DBGroup  = 'dbpana';
  protected $table = 'j_gallery_temasdia';
  
  // Change it for other database group
	// protected $DBGroup = 'default'; // default database group
  
	//...
   public function getProgramas()
  {
    return $this->findAll();
  }

}
