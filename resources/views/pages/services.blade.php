@extends('layouts.app')
@section('content')

    <h1>{{$mytitle}}</h1>
    <p>{{$paragraph}}</p> 
    @if(count($items)>0)
        <ul class="list-group">
            @foreach ($items as $item )
                <li class="list-group-item">{{$item}}</li>
            @endforeach
        </ul>
    @endif
    
@endsection
   
