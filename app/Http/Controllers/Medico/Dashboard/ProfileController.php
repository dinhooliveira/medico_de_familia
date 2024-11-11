<?php

namespace App\Http\Controllers\Medico\Dashboard;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function profile(): Response
    {
        return Inertia::render('Medico/Dashboard/Profile');
    }
}
