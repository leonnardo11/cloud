<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Categorias</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <header>
        @include('layouts.navigation')
        <div class="main-div">
            <h1>Categorias</h1>
            <p>Verifique e crie novas categorias no site.</p>
            <p style="margin-top: 10px; color: green; ">{{ session()->get('success') }}</p>
            <p style="margin-top: 10px; color: red;">{{ session()->get('successD') }}</p>
            <p style="color: green; text-shadow: 1px 2px 3px black;">{{session()->get('sucess')}}</p>
            <button id="buttoncategory"type="submit"><a href="{{route('category.create')}}">Criar Categoria</a></button>
        </div>
    </header>

    <main>
            @if (count($categories) == false)
                <p class="noProduct">Nenhuma Categoria Cadastrado</p>
            @else
            <table>
                <tr>
                  <th>ID</th>
                  <th>Nome da Categoria</th>
                  <th>Ações</th>
                </tr>
                @foreach ($categories as $category)
                <tr>
                  <td>#{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td class="actions">
                        <a href="{{ route('category.edit', $category->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('category.destroy', $category->id) }}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
@endif
        </div>
    </main>



</body>
