<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Like;
use Auth;

class LikeController extends Controller {
	public function __construct() {
        $this->middleware('auth');
    }

    public function like(Thread $thread) {
        if(Auth::user() != $thread->isLiked) {
            Like::create([
                'thread_id' => $thread->id,
                'user_id' => Auth::id()
            ]);
            return back();
        }
        else {
            return back();
        }
    } 

    public function unlike(Thread $thread) {
		$thread->likes()->detach(Auth::id());
		return back();
    }
}
