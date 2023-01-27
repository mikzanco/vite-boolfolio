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


    {{-- <a class="btn btn-success" href="{{route('admin.projects.create')}}">Nuovo Progetto</a> --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Tipologia</th>
            <th scope="col">Progetto</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($typologies as $typology)
            <tr>
                <th  scope="row">{{$typology->name}}</th>
                <td>
                    {{-- {{$typology->projects}} --}}
                    <ul>
                        @foreach($typology->projects as $project)
                            <li><a href="{{route('admin.projects.show', $project)}}">{{$project->name}}</a></li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach


        </tbody>

      </table>

</div>
@endsection
