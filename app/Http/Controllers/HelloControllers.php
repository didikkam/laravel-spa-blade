<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloControllers extends Controller
{
    public function home()
    {
        return 'ini home';
    }

    public function about()
    {
        return 'ini about';
    }
}
