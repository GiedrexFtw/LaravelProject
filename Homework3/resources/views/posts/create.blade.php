@extends('layouts.app')
@section('content')

    <h1>Create post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['placeholder' => 'title', 'class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('#editor', '', ['placeholder' => 'Body of post', 'class' => 'form-control']) }}
    </div>
    {!! Form::submit('Add', ['class' => 'btn btn-primary' ]) !!}
    {!! Form::close() !!}
@endsection
