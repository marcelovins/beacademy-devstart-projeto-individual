@extends('template.users')
@section('title', '$title')
@section('body')
    <h1 class= "container">{{$user->name}}</h1>
    <table class="table container" >
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">e-mail</th>
                    <th scope="col">Data Cadastro</th>
                    <th scope="col">Visualizar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{date('d/m/Y', strtotime($user->created_at))}}</td>
                        <td>
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning text-white">Editar</a>
                        </td>
                        <td>
                            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger text-white">Deletar</button>
                            </form>
                        </td>
                    </tr>
            </tbody>
        </table>
 @endsection
