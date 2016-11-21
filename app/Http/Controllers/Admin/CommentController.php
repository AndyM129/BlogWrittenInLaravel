<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home() {
        $comments = Comment::all();
        return view('admin/comment/home', ['comments' => $comments]);
    }


    /**
     * @param $id
     * @return $this
     */
    public function delete($id) {
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }

}
