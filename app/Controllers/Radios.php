<?php

namespace App\Controllers;

use App\Models\m_epa;

class Radios extends BaseController
{
  public function index()
  {
    $model = model(m_epa::class);

    $data['radios'] = $model->getRadios();
    $data['ciudades'] = $model->getCiudades();
    $data['redes_sociales'] = $model->getRedesSocilaesDeRadios();
    $data['footer_content'] = view('modules/footer_content', $data);
    $data['is_mobile']  = false;


    $agent = $this->request->getUserAgent();

    if ($agent->isMobile()) {
        $data['currentAgent']= $agent->getMobile();
        $data['is_mobile'] = true;
        return view('modules/head', $data)
              .view('modules/navbar', $data)
              .view('modules/header', $data)
              .view('mobile/radios', $data)
              .view('modules/playbar', $data)
              .view('modules/footer');
    } else { 
      return  view('modules/head', $data)
      . view('modules/navbar', $data)
      . view('modules/header', $data)
      . view('modules/playbar', $data)
      . view('radios', $data)
      . view('modules/footer');
    }
  }

  public function ajax_get_program($page) {
    $model = model(m_epa::class);
    $data = $model->getRadio($page);
    echo json_encode($data);
  }
    public function ajax_get_program_onda() {
    $model = model(m_epa::class);
    $data = $model->getRadio();
    echo json_encode($data);
  }
    public function ajax_get_program_pana() {
    $model = model(m_epa::class);
    $data = $model->getRadio();
    echo json_encode($data);
  }

  public function ajax_get_five_random_radios() {
    $model = model(m_epa::class);
    $radios = $model->getRadios();
    $rand_index = rand(0,count($radios) - 5);
    $data = array_slice($radios, $rand_index, 5); 
    echo json_encode($data);
  }
}
