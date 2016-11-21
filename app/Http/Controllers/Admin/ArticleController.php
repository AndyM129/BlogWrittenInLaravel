<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller {


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home() {
        $articles = Article::all();
        return view('admin/article/home', ['articles' => $articles]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        return view('admin/article/create');
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
        return view('admin/article/show', ['article' => $article]);
    }


    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'intro' => 'required|max:255',
            'content' => 'required',
        ]);

        /*
        $attributes = array(
            'title' => $request->get('title'),
            'intro' => $request->get('intro'),
            'content' => $request->get('content'),
        );
        $article = Article::create($attributes);
        if ($article) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
        */

        $article = new Article;
        $article->title = $request->get('title');
        $article->intro = $request->get('intro');
        $article->content = $request->get('content');
        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }


    /**
     * @param $id
     * @return $this
     */
    public function delete($id) {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }

}
