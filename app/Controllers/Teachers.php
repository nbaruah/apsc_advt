<?php

namespace App\Controllers;

class Teachers extends BaseController
{
    public function name()
    {
        echo 'Hello World from Teacher!!';
        echo '<pre>';
        print_r($this->request);
        echo '</pre>';
        //return view('welcome_message');
    }

    public function getFname()
    {
        echo 'Get first name';
    }
}
