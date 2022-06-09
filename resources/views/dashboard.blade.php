<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil {{Auth::user()->name}}</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <header>
        @include('layouts.navigation')
        <main>
            <section class="userInfo">
                <div class="userInfo-container">
                    <div class="userInfo-img">
                        <img src="{{asset(Auth::user()->image)}}"
                            alt="Foto do usuário(a) {{ Auth::user()->name }}" title="Foto do usuário(a) {{ Auth::user()->name }}">
                    </div>
                    <div class="userInfo-text">
                        <p style="color: green; font-size: 20px;" href="">{{session()->get('sucess')}} </p>
                        <h1>Bem-vindo(a), {{ Auth::user()->name }}</h1>
                        <p>{{ Auth::user()->email }}</p>
                        <p>Telefone: {{ Auth::user()->tel }}</p>
                        <p>
                            <a href="{{ url("/perfil/edit") }}" class="edit-profile">Editar Perfil</a>
                        </p>
                    </div>
                </div>
            </section>
            <div class="details-order">
                <p>Numero do Pedido</p>
                <p>Data do Pedido</p>
                <p>Status do Pedido</p>
                <p>Valor Total</p>
            </div>
            @if(count($pedidos) == false)
            <section class="orders">
                <p> Você não tem nenhum pedido em andamento :( </p>
            </section>
            @else
            <section class="orders">
                @foreach($pedidos as $pedido)
                <details>
                    <summary>
                        <p>#{{$pedido->order_id}}</p>
                        <p>{{$pedido->created_at->format('d/m/Y')}} </p>
                        <p>{{$pedido->state}}</p>
                        <p>R$ {{number_format($pedido->price * $pedido->units, 2, '.', ' ')}}</p>
                    </summary>
                    <div class="summary-content">
                            <img src="{{asset($pedido->productImage)}}">
                        <div class="summary-content-text">
                            <h1>{{$pedido->name}}</h1>
                            <p style="max-width:580px">Descrição do Produto: {{$pedido->description}}</p>
                            <p> Quantidade: {{$pedido->units}} </p>
                            <p>Valor unidade R$: {{number_format($pedido->price, 2, '.', ' ')}} </p>
                            <p>Valor total: R${{number_format($pedido->price * $pedido->units, 2, '.', ' ')}} </p>
                            <p class="chave"></p>
                        </div>
                    </div>
                </details>
                @endforeach
            </section>
            @endif
        </main>
</body>
