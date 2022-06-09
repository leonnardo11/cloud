<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produtos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <header>
        @include('layouts.navigation')
        <div class="main-div">
            <h1>Usuários cadastrados</h1>
            <p>Verifique os usuários cadastrados e suas informações.</p>
            <p style="color: red; font-shadow: 3px 2x 3x black;"> {{session()->get('noAccess')}} </p>
        </div>
    </header>
    <main>
            @if (count($usuarios) == false)
                <p class="noProduct">Nenhum Usuário Cadastrado</p>
            @else
            <table>
                <tr>
                  <th>ID</th>
                  <th>Imagem</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Role</th>
                </tr>
                @foreach ($usuarios as $usuario)
                <tr>
                  <td>#{{$usuario->id}}</td>
                    <td><img src="{{asset($usuario->image)}}" alt="Imagem do {{$usuario->name}}" title="Imagem do {{$usuario->name}}" /></td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    @if($usuario->admin == 1)
                        <td> ADMINISTRADOR </td>
                    @else
                        <td> CLIENTE </td>
                    @endif
                </tr>
                @endforeach
              </table>
            @endif
        </div>
    </main>


</body>
