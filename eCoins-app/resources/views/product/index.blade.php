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
            <h1>Produtos</h1>
            <p>Verifique todos os produtos cadastrados no site.</p>
            <p style="color: red; font-shadow: 3px 2x 3x black;"> {{session()->get('noAccess')}} </p>
            <button type="submit"><a href="{{route('product.create')}}">Criar Produto</a></button>
        </div>
    </header>
    <main>
            @if (count($products) == false)
                <p class="noProduct">Nenhum Produto Cadastrado</p>
            @else
            <table>
                <tr>
                  <th>ID</th>
                  <th>Imagem</th>
                  <th>Nome Produto</th>
                  <th>Valor</th>
                  <th>Quantidade</th>
                  <th>Ações</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                  <td>#{{$product->id}}</td>
                    <td><img src="{{asset($product->image)}}" alt="Imagem do {{$product->name}}" title="Imagem do {{$product->name}}" /></td>
                    <td>{{$product->name}}</td>
                    <td>R$ {{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td class="actions">
                        <a href="{{ route('product.edit', $product->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('product.destroy', $product->id) }}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
              </table>
            @endif
        </div>
    </main>


</body>
