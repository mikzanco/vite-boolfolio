@extends('layouts.app')

@section('title')
    | Progetto
@endsection

@section('content')
<div class="container">

    @if(session('message'))
        <div>
            <div class="alert alert-success" role="alert">
                Ottimo
            </div>
        </div>
    @endif

    <h1>{{$projects->name}}</h1>
    <h4>Tipologia: {{$projects->typology->name}}</h4>


    @if($projects->cover_image)
        <div>
            <img width="500" src="{{asset('storage/' . $projects->cover_image)}}" alt="{{$projects->cover_image_original}}">
            <div><i>{{$projects->cover_image_original}}</i></div>
        </div>
    @endif
    <img src="{{$projects->cover_image}}" alt="{{$projects->name}}">



    <p>{!! $projects->text !!}</p>
    <a href="{{route('admin.projects.index')}}" class="btn btn-info">Torna indietro</a>
   <a class="btn btn-warning" href="{{route('admin.projects.edit', $projects)}}"><i class="fa-solid fa-pen-to-square"></i>Edit</a>

</div>
@endsection
