<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        return view('modules/navbar')
                . view('about');
    }
    public function show($var = 'default variable')
    {
        return ('<h2>Hola desde</h2>'.$var);
    }
}
