@extends('template.users')
@section('title', 'Listagem de Postagens')
@section('body')

    <h1 class= "container">Postagens</h1>

    @foreach ($posts as $post)
        <div class="mb-3">
            <label class="form-label" for="">Id: {{ $post->id }}</label>
            <br>
            <label class="form-label" for="">Status: {{ $post->active?'Ativo':'Inativo' }}</label>
            <br>
            <label class="form-label" for="">Título: {{ $post->title }}</label>
            <br>
            <textarea name="" id="" cols="30" rows="5" class="form-control">Postagem: {{ $post->post }}</textarea>
        </div>                
    @endforeach

@endsection