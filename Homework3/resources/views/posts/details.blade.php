@extends('layouts.app')
@section('content')

    @if (!empty($details))
        <div class="container">
        <a href="{{url('/posts')}}" class="btn btn-dark">GO BACK</a>
            <h1 class="my-4">{{$details->title}}</h1>
        <small>Created at: {{$details->created_at}}</small>
            </h1>
            <div class="row">

            <div class="col-md-8">
                <img class="img-fluid" src="http://placehold.it/750x500" alt="">
            </div>

            <div class="col-md-4">
                <h3 class="my-3">{!!$details->body!!}</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                <h3 class="my-3">Project Details</h3>
                <ul>
                <li>Lorem Ipsum</li>
                <li>Dolor Sit Amet</li>
                <li>Consectetur</li>
                <li>Adipiscing Elit</li>
                </ul>
            <a href="/posts/{{$details->id}}/edit" class="btn btn-primary">EDIT</a>

            {!! Form::open(['action' => ['PostsController@destroy', $details->id],
            'method' => 'POST', 'class' => 'float-right']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {!! Form::submit('DELETE', ['onclick' => "return confirm('Are you sure?')", 'class' => 'btn btn-danger remove-record', 'id' => 'deletebtn']) !!}
            {!! Form::close() !!}
            </div>
            <script type="text/javascript">
                jQuery.noConflict();
                $(document).ready(function(){
                    $("deletebtn").on("click", function(){
                        confirm("Are you sure you want do delete this post?");
                    })
                });
            </script>
            </div>
            <h3 class="my-4">Related Posts</h3>

            <div class="row">

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                    </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                    </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                    </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                    </a>
            </div>

            </div>
        </div>
    @else
        <p>Something went wrong.</p>
    @endif
@endsection
