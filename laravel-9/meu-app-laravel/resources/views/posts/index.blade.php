@extends('template.users')
@section('title', 'Listagem de Postagens')
@section('body')
    <h1 class= "container">Postagens</h1>

    <table class="table container" >
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Usuário</th>
                <th scope="col">Postagem</th>
                <th scope="col">Data Cadastro</th>

            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->post}}</td>
                    <td>{{date('d/m/Y', strtotime($post->created_at))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="justify-content-center pagination">
        
    </div>
@endsection

<!-- criar model e migration -->
<!-- php artisan make:model NomeDaMigration -m -->

<!-- criar o seeder  -->
<!-- php artisan make:seeder NomeSeeder -->

<!-- cria o factory -->
<!-- php artisan make:factory NameFactory -->

<!-- implementa dados fake no banco -->
<!-- php artisan db:seed NameSeeder-->

