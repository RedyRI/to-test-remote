<?php

namespace App\Controllers;

use App\Models\m_epa;


class Nosotros extends BaseController
{
    public function index()
    {
        $model = model(m_epa::class);
        $data['radios'] = $model->getRadios();
        $data['footer_content'] = view('modules/footer_content');
        $data['is_mobile']  = false;

        $agent = $this->request->getUserAgent();   

        if ($agent->isMobile()) {
            $data['is_mobile']  = true;
            $data ['currentAgent']= $agent->getMobile();

            return view('modules/head')
                . view('modules/navbar', $data)
                . view('modules/header', $data)
                .view('mobile/nosotros')
                . view('modules/footer');
        } else {

            
            return  view('modules/head')
            . view('modules/navbar', $data)
            . view('modules/header', $data)
            . view('nosotros', $data)
            . view('modules/footer');
        }
    }
}
