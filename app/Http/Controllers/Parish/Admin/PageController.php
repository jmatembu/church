<?php

namespace App\Http\Controllers\Parish\Admin;

use App\Events\Parish\PostSaved;
use App\Http\Requests\Parish\UpdatePageRequest;
use App\Parish;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index(Parish $parish)
    {
        $pages = $parish->pages->paginate(15);

        return view('parish.admin.pages.index', compact('pages'));
    }

    public function store(Request $request, Parish $parish)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        $pageCategory = $parish->pageCategory;

        if (empty($pageCategory)) {
            // We create a new category for news if it does not exist
            $pageCategory = $parish->categories()->create([
                'name' => 'Page',
                'description' => 'A category of the pages of ' . $parish->name
            ]);
        }

        $newsPost = $request->only(['title', 'body']);
        $newsPost['category_id'] = $pageCategory->id;
        $newsPost['start_publishing_at'] = now()->toDateTimeString();
        $newsPost['author_id'] = $request->user()->id;

        //$page = $parish->posts()->create($newsPost);

        //event(new PostSaved($page));

        return redirect()->route('parish.admin.pages.index', $parish)
            ->with('success', 'Page created and published successfully');
    }

    public function show(Parish $parish, Post $page)
    {
        return view('parish.admin.pages.show', compact('parish', 'page'));
    }

    public function edit(Parish $parish, Post $page)
    {
        return view('parish.admin.pages.edit', compact('page'));
    }

    public function update(UpdatePageRequest $request, Parish $parish, Post $page)
    {
        $pagePost = $request->only(['title', 'body']);
        $pagePost['start_publishing_at'] = now()->toDateTimeString();

        $page->update($pagePost);

        return redirect()->route('parish.admin.pages.show',
            [
                'parish' => $parish,
                'page' => $page
            ])
            ->with('success', 'Page updated successfully.');
    }

    public function destroy(Parish $parish, Post $page)
    {
        try {
            if ($page->isAboutParish()) {
                return back()->with('error', 'You do not have permissions to delete this page.');
            }

            $page->delete();

            return redirect()->route('parish.admin.pages.index', $parish)
                ->with('success', 'Page deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
