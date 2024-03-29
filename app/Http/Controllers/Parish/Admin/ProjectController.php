<?php

namespace App\Http\Controllers\Parish\Admin;

use App\Parish;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Parish $parish)
    {
        $projects = $parish->projects->paginate(10);

        return view('parish.admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parish.admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Parish $parish)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $parish->projects()->create($request->only(['title', 'description', 'budget']));

        return redirect()->route('parish.admin.projects.index', $parish)
            ->with('success', 'Project created and published successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Parish $parish
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Parish $parish, Project $project)
    {
        return view('parish.admin.projects.show', compact('parish', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Parish $parish
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Parish $parish, Project $project)
    {
        return view('parish.admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Parish $parish
     * @param Project $project
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Parish $parish, Project $project)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $projectRecord = $request->only(['title', 'description', 'budget']);

        if ($request->hasFile('featured_image')) {
            $featuredImageFileName = now()->timestamp . '-featured-image.' . $request->file('featured_image')->getClientOriginalExtension();

            $project->addMediaFromRequest('featured_image')
                    ->usingFileName($featuredImageFileName)
                    ->toMediaCollection();

            // Delete old image
            $images = $project->getMedia();

            if ($images->count() > 1) {
                $images->first()->delete();
            }

        }

        $project->fill($projectRecord)->save();

        return redirect()->route('parish.admin.projects.index', $parish)
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parish $parish, Project $project)
    {
        try {
            $project->delete();

            return redirect()->route('parish.admin.projects.index', $parish);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
