<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function store($id, Request $request) {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'thread_id' => $id,
            'parent_id' => null
        ]);

        return back();
    }

    public function storeReply($id, Request $request) {
        $parent = Comment::find($id);

        $this->validate($request, [
            'comment' => 'required'
        ]);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'thread_id' => $parent->thread_id,
            'parent_id' => $parent->id
        ]);

        return back();
    }
}
