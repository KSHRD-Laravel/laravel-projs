<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function index() {
        // $articles = Article::chunk(2, function($articles) {
        //     foreach($articles as $article) {
        //         echo "".$article->title.'<br>';
        //     }
        // });

        // foreach(Article::where('title', 'A')->cursor() as $article) {
        //     echo "".$article->title.'<br>';
        // }

        $articles = Article::paginate(5);

        return view('articles', [
            'articles' => $articles
        ]);
    }

    function create() {
        return view('create');
    }

    function store(Request $request) {
        $title = $request->input('title');
        $description = $request->input('description');

        $article = new Article();
        $article->title = $title;
        $article->description = $description;

        $article->save();

        return redirect('/articles');
    }

    function edit($id) {
        // $article = Article::find($id);

        Article::find($id)->update(['title' => 'C', 'description' => 'C']);

        // $article->save();
    }

}
