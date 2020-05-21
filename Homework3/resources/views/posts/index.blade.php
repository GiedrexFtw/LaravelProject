@extends('layouts.app')
@section('content')

    <h1>Posts</h1>
    @if (count($posts)>0)
        @foreach ($posts as $post)
<div class="well"><a href="/posts/{{$post->id}}">{{$post->title}}</a></div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No posts found. Click here to add a new one!</p>
    @endif
@endsection