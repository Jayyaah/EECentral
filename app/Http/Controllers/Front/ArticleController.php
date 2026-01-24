<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return 'Front OK (temporaire)';
    }

    public function show($slug) {
        $article = Article::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('front.article', compact('article'));
    }
}

