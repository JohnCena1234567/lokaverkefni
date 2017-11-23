@extends('layouts.app')

@section('content')
<div class="container">
    @include('common.errors')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Create a New Thread</strong></div>
                <form method="POST" action="/threads">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <label>Title:</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                    </div>

                    <div class="panel-body">
                        <label>Body:</label>
                        <textarea rows="8" name="body" class="form-control">{{ old('body') }}</textarea>
                    </div>

                    <div class="panel-body">
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
