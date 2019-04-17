<?php

namespace App\Http\Controllers\Parish;

use App\Diocese;
use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParishController extends Controller
{
    public function index()
    {
        $parishes = Parish::with('diocese')->get();

        return view('site.parishes.index', compact('parishes'));
    }
}
