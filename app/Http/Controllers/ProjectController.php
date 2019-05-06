<?php

namespace App\Http\Controllers;

use App\Parish;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Parish $parish)
    {
        return view('parish.projects.index');
    }

    public function show(Parish $parish, Project $project)
    {
        return view('parish.projects.show', compact('project'));
    }
}
