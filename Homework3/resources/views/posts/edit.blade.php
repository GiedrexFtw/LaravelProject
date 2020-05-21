@extends('layouts.app')
@section('content')

    <h1>Update post</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $post->title, ['placeholder' => 'title', 'class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('#editor', $post->body, ['placeholder' => 'Body of post', 'class' => 'form-control']) }}
    </div>
    {!! Form::submit('Update', ['class' => 'btn btn-primary' ]) !!}
    {!! Form::close() !!}
@endsection
