@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="/posts/create">Create Post</a>
                    <hr>

                    <p class="lead">your Blog Post</p>
                @if(count($posts)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @foreach($posts as $post)    {{--Dashboard index--}}
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
                                    {!!Form::open(["action" => ["App\Http\Controllers\PostsController@destroy", $post->id],"method"=>"POST" , "class" => " float-right"])!!}
                                       {{Form::hidden("_method" , "DELETE")}}
                                       {{Form::submit("Delete" , ["class" => "btn btn-danger"])}}
                                    {!!Form::close()!!}
                            </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p class="small">You have no Posts</p>
                @endif
                    
                    {{-- {{ __('You are logged in!') }} --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
