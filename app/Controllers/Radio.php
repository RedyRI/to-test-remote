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
        $agent = $this->request->getUserAgent();

        $data['radio_info'] = $model->getRadio($pagina)[0];
        $data['slider_shadow'] = ($model->getRadio($pagina)[0])->sombra;
        $data['radio_info'] = $model -> getRadio($pagina)[0];
        $data['radios'] = $model -> getRadios();
        $data['is_mobile']  = false;
        $data['radio_page'] = true;
        
        if($agent->isMobile()) {
            $data['is_mobile']  = true;
            $data['currentAgent']= $agent->getMobile();
            return  view('modules/head', $data)
            . view('modules/navbar', $data)
            . view('modules/header', $data)
            . view('mobile/radio', $data)
            . view('modules/playbar', $data)
            . view('modules/footer');
        } else {   
            return  view('modules/head', $data)
            .view('modules/navbar', $data)
            .view('modules/header',$data)
            .view('modules/slider',$data)
            . view('radio', $data)
            . view('modules/playbar')
            .view('modules/footer');
        }
    }

    public function panamericana()
    {   
        $model = model(m_epa::class);
        $agent = $this->request->getUserAgent();

        $data['radio_info'] = $model -> getRadio('panamericana')[0];
        $data['programas'] = $model -> getProgramacionPanaHoy();
        $data['radios'] = $model -> getRadios();
        $data['radio_actual'] = 'panamericana';
        $data['is_mobile']  = false;
        $data['radio_page'] = true;

        
        if($agent->isMobile()) {
            $data['is_mobile']  = true;
            $data['currentAgent']= $agent->getMobile();
            return  view('modules/head', $data)
            . view('modules/navbar', $data)
            . view('modules/header', $data)
            . view('mobile/pana_onda_radio', $data)
            . view('modules/playbar', $data)
            . view('modules/footer');
        } else {     
            return  view('modules/head', $data)
            .view('modules/navbar', $data)
            .view('modules/header',$data)
            . view('modules/slider', $data)
            .view('pana_onda_radio', $data)
            . view('modules/playbar')
            .view('modules/footer');
        }
    }

    public function ondacero()
    {   
        $model = model(m_epa::class);
        $agent = $this->request->getUserAgent();

        $data['radio_info'] = $model->getRadio('onda-cero')[0];
        $data['programas'] = $model -> getProgramacionOndaHoy();
        $data['radios'] = $model -> getRadios();
        $data['radio_actual'] = 'ondacero';
        $data['is_mobile']  = false;
        $data['radio_page'] = true;

        if($agent->isMobile()) {
            $data['currentAgent']= $agent->getMobile();
            $data['is_mobile']  = true;
            return  view('modules/head', $data)
            . view('modules/navbar', $data)
            . view('modules/header', $data)
            . view('mobile/pana_onda_radio', $data)
            . view('modules/playbar', $data)
            . view('modules/footer');
        } else {     
            return  view('modules/head', $data)
            . view('modules/navbar', $data)
            . view('modules/header', $data)
            . view('modules/slider', $data)
            . view('pana_onda_radio', $data)
            . view('modules/playbar')
            . view('modules/footer');
        }
    }
}
