<?php

namespace App\Http\Controllers\Parish\Admin;

use App\Parish;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Parish $parish)
    {
        $news = $parish->news->paginate(10);

        return view('parish.admin.news.index', compact('news'));
    }

    public function create(Parish $parish)
    {
        return view('parish.admin.news.create');
    }

    public function store(Request $request, Parish $parish)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        $newsCategory = $parish->newsCategory;

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

        $parish->posts()->create($newsPost);

        return redirect()->route('parish.admin.news.index', $parish)
                         ->with('success', 'News Post created and published successfully');
    }

    public function show(Parish $parish, Post $news)
    {
        return view('parish.admin.news.show', compact('parish', 'news'));
    }

    public function edit(Parish $parish, Post $news)
    {
        return view('parish.admin.news.edit', compact('news'));
    }

    public function update(Request $request, Parish $parish, Post $news)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        $newsPost = $request->only(['title', 'body']);
        $newsPost['start_publishing_at'] = now()->toDateTimeString();

        $news->update($newsPost);

        return redirect()->route('parish.admin.news.show',
            [
                'parish' => $parish,
                'news' => $news
            ])
            ->with('success', 'News post updated successfully.');
    }

    public function destroy(Parish $parish, Post $news)
    {
        try {
            $news->delete();

            // Delete post image as well
            Storage::disk('public')->delete($news->featured_image);

            return redirect()->route('parish.admin.news.index', $parish)
                ->with('success', 'News post deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
