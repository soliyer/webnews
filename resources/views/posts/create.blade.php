@extends('layouts.app')
@section('content')
    <h1>Create Post</h1>
    {!! Form::open(["action"=>"App\Http\Controllers\PostsController@store" , "method" => "POST" , "enctype" => "multipart/form-data"])  !!}
        <div class="form">
            {{ Form::label('title' , 'Title') }}
            {{ Form::text('title' ,'',['class' => 'form-control' , 'placeholder' => "Title"])}}  
        </div>
        <div class="form mt-2">
            {{ Form::label('body' , 'Body') }}
            {{ Form::textarea('body' ,'',['id' => 'article-ckeditor','class' => 'form-control' , 'placeholder' => "Body Text"])}}  
        </div>
        <div class="form mt-2">
            {{Form::file("cover_image")}}
        </div>
        <div class="form mt-2">
            {{ Form::submit("Submit" , ["class" => "btn btn-primary"]) }}
        </div>
    {!!Form::close()!!}
@endsection

