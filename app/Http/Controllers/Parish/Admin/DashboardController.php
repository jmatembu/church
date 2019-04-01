<?php

namespace App\Http\Controllers\Parish\Admin;

use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Parish $parish)
    {
        return view('parish.admin.index');
    }
}
