<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home() {
        $articles = Article::all();
        return view('article/home', ['articles' => $articles]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id) {
        $article = Article::find($id);
        if(is_null($article)){
            abort(404);
        }
        //return view('article/show', ['article' => $article]);
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }
}
