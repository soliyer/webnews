@extends('layouts.app')
@section('content')

    <div class="border p-2 mt-2 bg-warning">
        <h1 >{{$postes->title}}</h1>
        <img style="width:100%" src="/storage/cover_images/{{$postes->cover_image}}">

            <div>{!!$postes->body!!}</div>
            <small>Written on {{$postes->created_at}} by {{$postes->user->name}}</small>
            <hr>
            
    </div>
    @if(!Auth::guest())
        @if(Auth::user()->id == $postes->user_id)
    <a class="btn btn-secondary mt-4" href="/posts"><-- Go Back</a>
    <a href="/posts/{{$postes->id}}/edit" class="btn btn-secondary mt-4">Edit</a>
    
    {!!Form::open(["action" => ["App\Http\Controllers\PostsController@destroy", $postes->id],"method"=>"POST" , "class" => "mt-4 float-right"])!!}
        {{Form::hidden("_method" , "DELETE")}}
        {{Form::submit("Delete" , ["class" => "btn btn-danger"])}}
    {!!Form::close()!!}
        @endif
    @endif
@endsection