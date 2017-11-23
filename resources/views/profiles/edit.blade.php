@extends('layouts.app')

@section('content')
<div class="container">
    @include('common.errors')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<div class="panel panel-default">
                <div class="panel-heading">Edit Thread</div>
            	<form method="POST" action="/threads/{{ $mythread->id }}/edit">
            		{{ csrf_field() }}
            		<div class="panel-body">
            			<label>Title:</label>
            			<input class="form-control" type="text" name="title" value="{{ $mythread->title }}">
            		</div>

                    <div class="panel-body">
                        <label>Body:</label>
                        <textarea class="form-control" rows="3" name="body">{{ $mythread->body }}</textarea>
                    </div>

                    <div class="panel-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            	</form>  
            </div>   
        </div>
    </div>
</div>
@endsection