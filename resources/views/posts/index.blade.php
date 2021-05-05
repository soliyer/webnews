@extends('layouts.app')
@section('content')
    <h1>Post</h1>
    @if(count($postm)>0)
        @foreach($postm as $item)

            <div class="well border p-2 mt-2 bg-light bg-gradient-primary">
                <div class="row">
                    <div class="col-md-4 col-sm-4 ">
                        <img style="width:100%" src="/storage/cover_images/{{$item->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <a class="btn-secondary text-secondary" href="/posts/{{$item->id}}"><h3>{{$item->title}}</h3></a>
                        <small>Written on {{$item->created_at}} by {{$item->user->name}}</small>
                    </div>
                </div>

                

            </div>
            {{-- <ul class="list-group">
                <li class="list-group-item">{{$item->title}}
                    <br> 
                    <small class="pt-2"> Written on {{$item->created_at}}</small>
                </li>
                
            </ul> --}}

        @endforeach
        {{$postm->links("pagination::bootstrap-4")}}
    @else

        <p>No Posts Available</p>

    @endif

    
@endsection