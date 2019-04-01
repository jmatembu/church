<?php

namespace App\Http\Controllers\Parish\Admin;

use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(Parish $parish)
    {
        return view('parish.admin.news.index');
    }
}
