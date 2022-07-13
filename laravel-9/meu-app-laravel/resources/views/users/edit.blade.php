@extends('template.users')
@section('title', "{$user->name}")
@section('body')
<h1>{{$user->name}}</h1>

    @if($errors->any())

    <div class="alert alert-danger" role="alert">
      @foreach($errors->all() as error)
          {{ $error }}
      @endforeach
    </div>
    @endif

<form action= "{{route('users.update', $user->id)}}" method="post">
    @method("PUT")
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">e-mail</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Senha</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
 
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection