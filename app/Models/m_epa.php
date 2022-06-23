<?php
namespace App\Models;
use CodeIgniter\Model;



class m_epa extends Model
{
  
  function __construct(){
    // Call the Model constructor
		parent::__construct();
    $this -> db1 = \Config\Database::connect('default');
    $this -> db2 = \Config\Database::connect('dbonda');
    $this -> db3 = \Config\Database::connect('dbpana');
	}

   public function getRadios()
  {

    $query   = $this -> db1->query('SELECT * FROM epa_radios');
    $results = $query->getResult();
    return $results;
  }

  public function getRedesSocilaesDeRadios()
  {

    $query   = $this -> db1->query("SELECT epa_radios.pagina AS radio, redes_sociales_de_radios.fb AS fb, redes_sociales_de_radios.insta AS insta , redes_sociales_de_radios.tiktok AS tiktok ,redes_sociales_de_radios.twitter AS twitter ,redes_sociales_de_radios.youtube AS youtube,redes_sociales_de_radios.web AS web FROM epa_radios JOIN redes_sociales_de_radios ON epa_radios.id = redes_sociales_de_radios.RadioID");
    $results = $query->getResult();
    return $results;
  
  }

  public function getProgramasOnda()
  {

    $query   = $this -> db2->query('SELECT * FROM j_gallery_temasdia');
    $results = $query->getResult();
    return $results;
  }

  public function getProgramasPana()
  {

    $query   = $this -> db3->query('SELECT * FROM j_gallery_temasdia');
    $results = $query->getResult();
    return $results;
  }

  public function getProgramacionOndaHoy()
  {
    date_default_timezone_set("America/Lima");
		$dia = date("N");

    $sql = "SELECT entry AS idPrograma, SUBSTRING_INDEX( title, '-', 1 ) AS titlePrograma, SUBSTRING_INDEX( title, '-', -1 ) AS locutor, hora AS horaPrograma, hora2 as finPrograma, urlPhotoLocutor as fotoLocutor, urlPhoto as fotoBloque FROM j_gallery_temasdia WHERE dia = ? AND active = ? ORDER BY hora ASC";
    
    $query = $this -> db2 -> query($sql, [$dia, 1]);
    $results = $query->getResult();
    return $results;
  }

    public function getProgramacionPanaHoy()
  {
    date_default_timezone_set("America/Lima");
		$dia = date("N");

    $sql = "SELECT entry AS idPrograma, SUBSTRING_INDEX( title, '-', 1 ) AS titlePrograma, SUBSTRING_INDEX( title, '-', -1 ) AS locutor, horaInicio AS horaPrograma, horaFin as finPrograma, urlPhoto3 as PhotoLocutor, urlPhoto3 as PhotoLocutor, urlPhoto2 as urlPhotoBloque FROM j_gallery_temasdia WHERE dia = ? AND active = ? ORDER BY horaInicio ASC";  
    
    $query = $this -> db3 -> query($sql, [$dia, 1]);
    $results = $query->getResult();
    return $results;
  }
}
