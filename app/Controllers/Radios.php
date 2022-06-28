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

  public function ajax_get_program_onda_pana($page)
  {
    $model = model(m_epa::class);
    if ($page == 'onda-cero') {
      $programas = $model->getProgramacionOndaHoy();
      $radio_actual = 'onda-cero';
      $radio_info = $model->getRadio('onda-cero')[0];
    } else {
      $programas = $model->getProgramacionPanaHoy();
      $radio_actual = 'panamericana';
      $radio_info = $model->getRadio('panamericana')[0];
    }

    // ********************************************

    $programa_actual_array = array_filter($programas, function ($data) {
      $hoy = date('H:i:s');
      return ($hoy >= $data->horaPrograma && $hoy < $data->finPrograma);
    });
    $programa_actual_index = array_keys($programa_actual_array)[0];

    $bloque = array();
    foreach ($programa_actual_array as $programa) {
      $bloque['nombre'] = $programa->titlePrograma;
      $bloque['locutor'] = $programa->locutor;
      $bloque['horaInicio'] = date('h:i a', strtotime($programa->horaPrograma));
      $bloque['horaFin'] = date('h:i a', strtotime($programa->finPrograma));

      if ($radio_actual == 'panamericana') {
        $bloque['fotoLocutor'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programa->fotoLocutor;
        $bloque['fotoBloque'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programa->fotoBloque;
        $bloque['fotoPrograma'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programa->fotoLogo;
        $bloque['page_background'] = $radio_info->fondo != '' ? ' url("https://www.radiopanamericana.com/images/nuevo-banner-fondo-web.png")' : 'radial-gradient(#FEE248 30%, #FFA01C 100%)';


        if ($programa_actual_index == count($programas) - 1) {
          $bloque['sigProgramaBanner'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programas[0]->fotoBloque;
        } else {
          $bloque['sigProgramaBanner'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programas[$programa_actual_index  + 1]->fotoBloque;
        }
      } else {
        $bloque['fotoLocutor'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programa->fotoLocutor;
        $bloque['fotoBloque'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programa->fotoBloque;
        $bloque['page_background'] = 'radial-gradient(#FEE248 30%, #FFA01C 100%)';

        if (trim($programa->locutor) == 'Onda Cero') {
          $bloque['fotoPrograma'] = 'https://www.ondacero.com.pe/images/' . str_replace(' ', '_', trim($programa->titlePrograma)) . '_SL.png';
        } else {
          $bloque['fotoPrograma'] = 'https://www.ondacero.com.pe/images/' . str_replace(' ', '_', trim($programa->titlePrograma)) . '.png';
        }

        if ($programa_actual_index == count($programas) - 1) {
          $bloque['sigProgramaBanner'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programas[0]->fotoBloque;
        } else {
          $bloque['sigProgramaBanner'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programas[$programa_actual_index + 1]->fotoBloque;
        }
      }
    }
    // ********************************************

    echo json_encode($bloque);
  }
}
