@extends('layouts.app')

@section('content')
<div class="container">
    @include('common.errors')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>
                        {{ $thread->title }}
                    </strong>
                    <div class="pull-right text-muted">
                        <a href="/profile/{{ $thread->user->id }}">{{ $thread->user->name }}</a>
                        {{ $thread->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="panel-body">               
                    <div class="body">
                        {{ $thread->body }}  
                    </div>

                    @if($thread->isLiked)
                        <a class="unlike" href="/unlike/{{ $thread->id }}"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a>
                    @else
                        <a class="like" href="/like/{{ $thread->id }}"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a>
                    @endif
                    {{ $thread->likes->count() }}   

                </div>
            </div>

            @guest
            @else
            <form method="POST" action="/comment/{{ $thread->id }}" class="panel">
                {{ csrf_field() }}
                <div class="panel-body">
                    <label>New Comment</label>
                    <textarea name="comment" class="form-control" rows="3"></textarea>
                </div>
                <div class="panel-body">
                    <button type="submit" class="btn btn-primary">Submit</button> 
                </div>
            </form>
            @endguest
            
            @if($thread->comments->count() > 0)
                <h4>Comments</h4>                
                @foreach($thread->comments as $comment)
                    <div class="list-group">
                        @if($comment->parent_id == null)
                            <div class="list-group-item">                                            
                                <h4>
                                    <a href="/profile/{{ $comment->user_id}}">
                                        {{ $comment->user->name }}
                                    </a>
                                    <small>
                                        {{ $comment->created_at->diffForHumans() }}
                                    </small>
                                </h4>                              
                                <p class="list-group-item-text">{{ $comment->comment }}</p>

                                <a data-id="{{ $comment->id }}" class="show_input" href="#">Reply</a>
                                <form id="replyinput-{{ $comment->id }}" method="POST" action="/comment/reply/{{ $comment->id }}" style="display: none;">
                                    {{ csrf_field() }}
                                    <div class="col-md-10">
                                        <input type="text" name="comment" class="form-control input-sm">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Reply</button>
                                </form>

                            </div>
                        @endif
                        @if($comment->children->count() != 0)
                            <a data-id="{{ $comment->id }}" class="show_comments" href="#">
                                View all {{ $comment->children->count() }} replies<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                            </a>
                            <a data-id="{{ $comment->id }}" class="hide_comments" href="#" style="display: none;">
                                Hide replies<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
                            </a>
                        @endif
                    </div>
                    <div id="replycomment-{{ $comment->id }}" style="display: none">
                    @foreach($comment->children as $reply)
                        <div class="list-group">
                            <div class="list-group-item col-md-offset-1" style="background-color: #DCDCDC">
                                <h5>
                                    <a href="/profile/{{ $reply->user_id }}">
                                        {{ $reply->user->name }}
                                    </a>
                                    <small>
                                        {{ $reply->created_at->diffForHumans() }}
                                    </small>
                                </h5>
                                <div class="list-group-item-text">                         
                                    {{ $reply->comment }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                @endforeach
            @else
                <p class="text-muted">No Comments, be first to comment!</p>
            @endif

        </div>
    </div>
</div>
@endsection
