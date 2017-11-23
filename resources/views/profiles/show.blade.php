@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if($mythreads->count() == 0)
                <h4>You dont have any thread yet! Create one now! <a href="/threads/create">Create Thread</a></h4>
            @else   
                @foreach ($mythreads as $mythread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <label>
                                <a href="/threads/{{$mythread->id}}">
                                    <strong>{{ $mythread->title }}</strong> 
                                </a>
                            </label>
                        </div>
                        <div class="panel-body">
                            <article>
                                <div class="body">
                                    {{ $mythread->body }}
                                </div>
                            </article>
                        </div>
                    </div> 
                    <form method="POST" action="/threads/{{$mythread->id}}/delete">
                        {{ csrf_field() }}
                        <div style="margin-top: -20px; margin-bottom: 25px;">
                            <button class="btn btn-danger" type="submit">Delete</button>
                            <a class="btn btn-warning" href="/profile/mythread/{{$mythread->id}}">Edit</a>
                        </div>
                    </form>
                @endforeach
            @endif     
        </div>
    </div>
</div>
@endsection
