<?php

namespace App\Http\Controllers\Administrator;

use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParishController extends Controller
{
    public function show(Parish $parish)
    {
        return view('backend.parishes.show', compact('parish'));
    }
}
