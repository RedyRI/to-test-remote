<?php

namespace App\Controllers;
use App\Models\m_epa;
class Radio extends BaseController
{
    public function index()
    {   
        $model = model(m_epa::class);

        $data['radios'] = $model -> getRadios();
        $data['ciudades'] = $model -> getCiudades();
        $data['redes_sociales'] = $model -> getRedesSocilaesDeRadios();

        return  view('modules/head', $data)
        .view('modules/navbar', $data)
        .view('modules/header',$data)
        .view('modules/slider',$data)
        .view('home', $data)
        .view('modules/footer');
    }
    public function show($pagina)
    {   
        $model = model(m_epa::class);
        $data['radio_info'] = $model -> getRadio($pagina)[0];
        $data['radios'] = $model -> getRadios();

        return  view('modules/head', $data)
        .view('modules/navbar', $data)
        .view('modules/header',$data)
        .view('modules/slider',$data)
        .view('modules/playbar')
        .view('radio', $data)
        .view('modules/footer');
    }

    public function panamericana()
    {   
        $model = model(m_epa::class);
        $data['radio_info'] = $model -> getRadio('panamericana')[0];
        $data['programas'] = $model -> getProgramacionPanaHoy();
        $data['radios'] = $model -> getRadios();
        $data['radio_actual'] = 'panamericana';

        return  view('modules/head', $data)
        .view('modules/navbar', $data)
        .view('modules/header',$data)
        .view('modules/slider',$data)
        .view('modules/playbar')
        .view('pana_onda_radio', $data)
        .view('modules/footer');
    }

    public function ondacero()
    {   
        $model = model(m_epa::class);
        $data['radio_info'] = $model -> getRadio('ondacero')[0];
        $data['programas'] = $model -> getProgramacionOndaHoy();
        $data['radios'] = $model -> getRadios();
        $data['radio_actual'] = 'ondacero';

        return  view('modules/head', $data)
        .view('modules/navbar', $data)
        .view('modules/header',$data)
        .view('modules/slider',$data)
        .view('modules/playbar')
        .view('pana_onda_radio', $data)
        .view('modules/footer');
    }
}
