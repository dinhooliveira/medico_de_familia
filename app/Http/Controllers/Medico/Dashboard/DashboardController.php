<?php

namespace App\Http\Controllers\Medico\Dashboard;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Medico/Dashboard/Index');
    }

}
