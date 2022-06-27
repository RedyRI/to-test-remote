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

        return  view('modules/head')
            . view('modules/navbar')
            . view('modules/header', $data)
            . view('nosotros', $data)
            . view('modules/footer');
    }
}
