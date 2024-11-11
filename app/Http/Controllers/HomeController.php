<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Home/Index');
    }
}
