@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @foreach ($threads as $thread)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/threads/{{$thread->id}}">
                        <strong>{{ $thread->title }}</strong> 
                    </a> 
                    <div class="pull-right text-muted">
                        <a href="/profile/{{ $thread->user->id }}">{{ $thread->user->name }}</a>
                        {{ $thread->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="panel-body">
                    <article>
                        <div class="body">
                            {{ $thread->body }}
                        </div>
                    </article>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            {{ $threads->links() }}
        </div>
        </div>
    </div>
</div>
@endsection
