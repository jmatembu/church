<?php

namespace App\Http\Controllers\Parish\Admin;

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

    public function create(Parish $parish)
    {
        return view('parish.admin.pages.create');
    }

    public function store(Request $request, Parish $parish)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'post-image' => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        $newsCategory = $parish->pageCategory;

        if (empty($newsCategory)) {
            // We create a new category for news if it does not exist
            $newsCategory = $parish->categories()->create([
                'name' => 'News',
                'description' => 'A category of the latest news at the parish.'
            ]);
        }

        $newsPost = $request->only(['title', 'body']);
        $newsPost['category_id'] = $newsCategory->id;
        $newsPost['start_publishing_at'] = now()->toDateTimeString();
        $newsPost['author_id'] = $request->user()->id;

        if ($request->hasFile('post-image')) {
            $newsPostFileName = 'featured_image.' . $request->file('post-image')->getClientOriginalExtension();
            $parishPostsDirectory = 'public/parishes/' . $parish->slug . '/images/news';
            $filePath = $request->file('post-image')->storeAs($parishPostsDirectory, $newsPostFileName);

            $newsPost['media'] = [
                'image' => Str::after($filePath, 'public/')
            ];
        }

        $parish->posts()->create($newsPost);

        return redirect()->route('parish.admin.news.index', $parish)
            ->with('success', 'News Post created and published successfully');
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

        if ($request->hasFile('post-image')) {
            $fileName = 'featured_image_' . now()->timestamp . '.' . $request->file('post-image')->getClientOriginalExtension();
            $postDirectory = 'public/parishes/' . $parish->slug . '/images/pages';
            $filePath = $request->file('post-image')->storeAs($postDirectory, $fileName);
            // Delete old page image
            Storage::disk('public')->delete($page->featured_image);

            $pagePost['media'] = [
                'image' => Str::after($filePath, 'public/')
            ];
        }

        $page->update($pagePost);

        return redirect()->route('parish.admin.pages.show', ['parish' => $parish, 'page' => $page])
            ->with('success', 'Page updated successfully.');
    }

    public function destroy(Parish $parish, Post $page)
    {
        try {
            $page->delete();
            Storage::disk('public')->delete($page->featured_image);


            return redirect()->route('parish.admin.pages.index', $parish)
                ->with('success', 'Page deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
