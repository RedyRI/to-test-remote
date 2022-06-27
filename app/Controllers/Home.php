<?php

namespace App\Controllers;
use App\Models\m_epa;
class Home extends BaseController
{
    public function index()
    {   
        $model = model(m_epa::class);
        $agent = $this->request->getUserAgent();

        $data['radios'] = $model -> getRadios();
        $data['ciudades'] = $model -> getCiudades();
        $data['redes_sociales'] = $model -> getRedesSocilaesDeRadios();
        $data['is_mobile']  = false;
        
        if($agent->isMobile()) {
            $data['currentAgent']= $agent->getMobile();
            $data['first_radios'] = array_slice($data['radios'], 0, 5);
            $data['is_mobile']  = true;
            return  view('modules/head', $data)
            .view('modules/navbar', $data)
            .view('modules/header',$data)
            .view('mobile/home', $data)
            .view('modules/footer');
        } else {
            return  view('modules/head', $data)
            .view('modules/navbar', $data)
            .view('modules/header',$data)
            .view('modules/slider',$data)
            .view('home', $data)
            .view('modules/footer');
        }
    }
}
