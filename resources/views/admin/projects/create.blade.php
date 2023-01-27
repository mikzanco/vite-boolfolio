@extends('layouts.app')

@section('title')
    | Admin
@endsection

@section('content')
<div class="container">
    <h1>Nuovo progetto</h1>

    @if($errors->any())
        <div>
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
            @error('title')
                <p class="invalid-feedback"> {{$message}} </p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="client_name" class="form-label">Nome del cliente</label>
            <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" placeholder="client_name" value="{{old('client_name')}}">
            @error('client_name')
                <p class="invalid-feedback"> {{$message}} </p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="client_name" class="form-label">Tipologia</label>
            <select class="form-select" name="typology_id" aria-label="Default select example">
                <option value="">Selezionare una tipologia</option>
                @foreach($typologies as $typology)
                    <option
                    @if($typology->id == old('$typology->id')) selected @endif
                    value="{{$typology->id}}">{{$typology->name}}</option>
                @endforeach
              </select>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine</label>
            <input
            onchange="showImage(event)"
            type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" placeholder="cover_image" value="{{old('cover_image')}}">
            @error('cover_image')
                <p class="invalid-feedback"> {{$message}} </p>
            @enderror
            <div class="mt-2">
                <img width="150" id="output-image" src="" alt="">
            </div>
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Sommario</label>
            <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary" rows="3">{{old('summary')}}</textarea>
            @error('summary')
                <p class="invalid-feedback"> {{$message}} </p>
            @enderror
        </div>
        <button type="submit" class="btn btn-success" >Invio</button>

    </form>
</div>

<script>
    function showImage(event){
        const tagImage = document.getElementById('output-image');
        tagImage.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
