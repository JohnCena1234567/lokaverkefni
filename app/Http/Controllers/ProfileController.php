<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Thread;
use Auth;
use Input;

class ProfileController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

    public function index($id) {
        if(User::where('id', '=', $id)->first() == null) {
            return back();
        }
        else {
    	    $user = User::find($id);
            $threads = $user->threads()->paginate(5);
            return view('profiles.index', compact('user', 'threads'));
        }
    }

    public function show() {
    	$mythreads = Auth::user()->threads;

    	return view('profiles.show', compact('mythreads'));
    }

    public function edit($id) {
        $mythread = Thread::find($id);
        
        if(Thread::where('id', '=', $id)->first() != null) {
            if(Auth::user()->id == $mythread->user_id) { 
                return view('profiles.edit', compact('mythread'));
            }
            else {
                return back();
            }
        }
        else {
            return back();
        }

    }
}
