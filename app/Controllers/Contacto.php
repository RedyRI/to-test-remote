<?php

namespace App\Controllers;

use App\Models\m_epa;


class Contacto extends BaseController
{
  public function index()
  {
    $model = model(m_epa::class);
    $data['radios'] = $model->getRadios();
    $data['footer_content'] = view('modules/footer_content');

    $agent = $this->request->getUserAgent();

    // if ($agent->isBrowser()) {
    //   $currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
    // } elseif ($agent->isRobot()) {
    //   $currentAgent = $agent->getRobot();
    // } elseif ($agent->isMobile()) {
    //   $currentAgent = $agent->getMobile();
    // } else {
    //   $currentAgent = 'Unidentified User Agent';
    // }

    if ($agent->isMobile()) {
      return view('mobile/contacto');
    } else {
      return  view('modules/head')
        . view('modules/navbar')
        . view('modules/header', $data)
        . view('contacto', $data)
        . view('modules/footer');
    }
  }
}
