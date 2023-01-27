@extends('layouts.app')

@section('title')
    | Admin
@endsection

@section('content')
<div class="container">
    <h1>Elenco dei progetti</h1>

    @if(session('deleted'))
        <div role="alert" class="alert alert-success">
            {{session('deleted')}}
        </div>

    @endif


    <a class="btn btn-success" href="{{route('admin.projects.create')}}">Nuovo Progetto</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col"><a href="{{ route('admin.projects.orderby', ['id', 'direction'])}}">ID</a></th>
            <th scope="col"><a href="{{ route('admin.projects.orderby', ['name','direction'])}}">Nome</a></th>
            <th scope="col"><a href="{{ route('admin.projects.orderby', ['client_name', 'direction'])}}">Nome cliente</a></th>
            {{-- <th scope="col">Riasssunto</th> --}}
            <th scope="col">AZIONI</th>
            {{-- <th scope="col">cover_image</th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <th  scope="row">{{$project->id}}</th>
                <td>{{$project->name}} <span class="badge text-bg-info">{{$project->typology->name}}</span></td>
                <td>{{$project->client_name}}</td>
                {{-- <td>{{$project->summary}}</td> --}}
                <td class="d-flex">
                    <a class="btn btn-success" href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-eye"></i>Show</a>
                    <a class="btn btn-warning" href="{{route('admin.projects.edit', $project)}}"><i class="fa-solid fa-pen-to-square"></i>Edit</a>

                    @include('admin.partials.form-delete', ['projects'=>$project])

                </td>
            </tr>
            @endforeach


        </tbody>

      </table>
      {{$projects->links()}}
</div>
@endsection
