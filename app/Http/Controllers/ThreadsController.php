<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use Auth;

class ThreadsController extends Controller {
    public function __construct() {
        $this->middleware('auth')->except('index', 'show');
    }
    
    public function index() {
    	$threads = Thread::orderBy('created_at', 'desc')->paginate(5);

    	return view('threads.index', compact('threads'));
    }

    public function create() {
    	return view('threads.create');
    }

    public function show($id) {
        $thread = Thread::find($id);
        
        return view('threads.show', compact('thread'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:40',
            'body' => 'required'
        ]);

        Thread::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);

        return redirect('/threads');
    }

    public function delete($id) {     
        $thread = Thread::find($id);

        if(Auth::user()->id == $thread->user_id)
            $thread->delete();
        
        return redirect('/profile/mythreads');     
    }

    public function edit($id, Request $request) {
        $this->validate($request, [
            'title' => 'required|max:40',
            'body' => 'required'
        ]);

        $thread = Thread::find($id);
        
        $input = $request->all();
        $thread->fill($input)->save();

        return redirect('/profile/mythreads'); 
    }
}
