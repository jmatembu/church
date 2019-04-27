<?php

namespace App\Http\Controllers;

use App\Post;
use App\Parish;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $news = $this->getParish()->news->paginate(10);

        return view('parish.news.index', compact('news'));
    }

    public function show(Parish $parish, Post $post)
    {
        return view('parish.news.show', compact('post'));
    }

    protected function getParish()
    {
        $parish = request()->parish;

        if (is_string($parish)) {
            return Parish::where('slug', $parish)->first();
        }

        return request()->parish;
    }
}
