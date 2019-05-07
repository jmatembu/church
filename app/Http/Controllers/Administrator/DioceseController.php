<?php

namespace App\Http\Controllers\Administrator;

use App\Diocese;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DioceseController extends Controller
{
    public function index()
    {
        $dioceses = Diocese::orderBy('name')->get();

        return view('backend.dioceses.index', compact('dioceses'));
    }

    public function store(Request $request)
    {

    }

    public function show(Diocese $diocese)
    {
        return view('backend.dioceses.show', compact('diocese'));
    }
}
