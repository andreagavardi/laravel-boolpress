<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all()->sortByDesc('id');
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required | max:100 | min:10',
            'category_id' => 'nullable | exists:categories,id',
            'image' => 'nullable | image | max:60000',
            'body' => 'nullable',
            'author' => 'required | max:50 | min:10'
        ]);

        ddd($request->all());
        if ($request->hasFile('image')) {
            $image_path = Storage::put('posts_images', $validated['image']);
            $validated['image'] = $image_path;
        }
        //ddd($validated['image']);
        Article::create($validated);
        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('guests.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //ddd($article->image);

        $validated = $request->validate([
            'title' => 'required | max:100 | min:10',
            'category_id' => 'nullable | exists:categories,id',
            'image' => 'nullable | image | max:60000',
            'body' => 'nullable',
            'author' => 'required | max:50 | min:10'
        ]);
        //ddd($request->all());
        //ddd($request->hasFile('image'));
        if ($request->hasFile('image')) {
            Storage::delete($article->image);
            $image_path = Storage::put('posts_images', $validated['image']);
            $validated['image'] = $image_path;
        }
        //ddd($validated['image']);
        $article->update($validated);
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index');
    }
}
