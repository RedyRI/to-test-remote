<?php

namespace App\Controllers;
use App\Models\m_epa;
class Home extends BaseController
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
}
