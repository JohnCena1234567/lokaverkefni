@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $user->name }} <small>On blogg since {{ str_limit($user->created_at, 10, '') }}</small></h1>
        </div>
    </div>
    
    <h4 class="col-md-6 col-md-offset-2"><strong>Users Threads</strong></h4>
    <div class="col-md-7 col-md-offset-2">
        @if($user->threads->count() == 0)
            @if(Auth::id() == $user->id)
                <h5>You dont have any thread yet! Create one now! <a href="/threads/create">Create Thread</a></h5>
            @else
                <h5>This user didn't create any thread yet!</h5>
            @endif
        @else
            @foreach($threads as $thread)
                <ul class="list-group">
                    <li class="list-group-item"><a href="/threads/{{ $thread->id }}">{{ $thread->title }}</a></li>
                    <li class="list-group-item">{{ str_limit($thread->body, 70) }}</li>
                </ul>
            @endforeach
            <div class="text-center">
                {{ $threads->links() }}
            </div>
        @endif
    </div>

    <div class="panel panel-default col-md-3">
        <div class="panel-body">
            <h4><strong>Name</strong></h4>
            <h5>{{ $user->name }}</h5>
            <h4><strong>E-mail</strong></h4>
            <h5>{{ $user->email }}</h5>
            <h4><strong>Threads:</strong> {{ $user->threads->count() }}</h4>
        </div>
    </div>
</div>
@endsection
