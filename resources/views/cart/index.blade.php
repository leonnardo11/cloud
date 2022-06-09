<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <header>
        @include('layouts.navigation')
    </header>
    <main>
        <p style="color: green;"> {{session()->get('quantRemove')}} </p>
        <p style="color: green;"> {{session()->get('removed')}} </p>
        <p style="color: red;"> {{session()->get('error')}} </p>
        <section class="cartMain">
        <aside>
            <div class="total">
               <div class="total-header">
                   <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M22.5 24H6C5.57812 24 5.22266 23.8556 4.93359 23.5668C4.64453 23.278 4.5 22.9229 4.5 22.5015V20.6049C3.17188 20.121 2.08984 19.3015 1.25391 18.1463C0.417969 16.9912 0 15.6878 0 14.2361C0 12.7844 0.417969 11.481 1.25391 10.3259C2.08984 9.17073 3.17188 8.35902 4.5 7.89073V1.52195C4.5 1.1161 4.64453 0.764878 4.93359 0.468293C5.22266 0.171707 5.57812 0.0234146 6 0.0234146H15V8.26537C15 8.46829 15.0742 8.6439 15.2227 8.7922C15.3711 8.94049 15.5469 9.01463 15.75 9.01463H23.9766L24 9.03805V22.5015C24 22.9073 23.8516 23.2585 23.5547 23.5551C23.2578 23.8517 22.9062 24 22.5 24ZM14.8125 20.3707L11.2734 16.8585C11.7578 16.0312 12 15.1571 12 14.2361C12 12.8 11.4883 11.5668 10.4648 10.5366C9.44141 9.50634 8.20312 8.99122 6.75 8.99122C5.29688 8.99122 4.05859 9.50244 3.03516 10.5249C2.01172 11.5473 1.5 12.7844 1.5 14.2361C1.5 15.6878 2.01172 16.9249 3.03516 17.9473C4.05859 18.9698 5.29688 19.481 6.75 19.481C7.65625 19.481 8.53125 19.239 9.375 18.7551L12.8906 22.2907C13.0156 22.4156 13.1719 22.478 13.3594 22.478C13.5469 22.478 13.7109 22.4156 13.8516 22.2907L14.8125 21.3307C14.9375 21.2059 15 21.0498 15 20.8624C15 20.6751 14.9375 20.5112 14.8125 20.3707ZM6.75 17.9824C5.71875 17.9824 4.83594 17.6195 4.10156 16.8937C3.36719 16.1678 3 15.2859 3 14.2478C3 13.2098 3.36719 12.3239 4.10156 11.5902C4.83594 10.8566 5.71875 10.4898 6.75 10.4898C7.78125 10.4898 8.66406 10.8566 9.39844 11.5902C10.1328 12.3239 10.5 13.2098 10.5 14.2478C10.5 15.2859 10.1328 16.1678 9.39844 16.8937C8.66406 17.6195 7.78125 17.9824 6.75 17.9824ZM16.5 0C16.9062 0.0156098 17.25 0.163902 17.5312 0.444878L23.5547 6.46244C23.8516 6.75902 23.9922 7.11024 23.9766 7.5161H16.5V0Z" fill="#FF6500"></path></svg>
                   <p>Resumo</p>
               </div>
               <?php $total = 0.0 ?>
                @foreach($itens as $item)
                <p>{{$item->Product->name}} - <span>R$ {{number_format($item->Product->price * $item->units, 2, '.', ' ')}}</span> </p>
                <hr style="padding-bottom: 1px; margin-bottom: 20px">
                <?php $total += $item->Product->price * $item->units ?>
                @endforeach
                <p style="margin-top: 50px; margin-bottom: 30px;" class="total-price">Total: R$ {{number_format($total, 2)}} </p>
                <p style="color: red; margin-top: 30px;"> Instruções de Entrega: </p>
                <p style="margin-bottom: 50px"> Por se tratar de moedas digitais, seu envio também é digital, sendo assim confirme o e-mail abaixo, e receba a KEY para ativar as moedas dentro de seu game.</p>
                <div>
                    <form method="POST" action="{{route('order.store')}}">
                    <p>Endereço de Email</p>
                    <input type="text" name="email" placeholder="{{Auth::user()->email}}" required />
                </div>

                    @csrf
                    <button style="margin-top: 20px;" value="{{$total}}" name="total" type="submit">Realizar pedido </button>
                </form>
            </div>
           </aside>
        @if (count($itens) == false)
        <p style="text-align: center;" class="noProduct">Parece que você ainda não tem nenhum produto no seu carrinho :( </p>
        <a class="noProduct" href="{{route('product.index')}}"> Ver produtos </a>
        @else
        <table class="table-cart">
            <tr>
              <th>Imagem</th>
              <th>Nome do Produto</th>
              <th>Valor</th>
              <th>Quantidade</th>
              <th>Total</th>
            </tr>
            @foreach ($itens as $item)
            <tr>
                <td><img src="{{asset($item->Product->image)}}" alt="Produto 1" /></td>
                <td>{{$item->Product->name}}</td>
                <td>R$ {{number_format($item->Product->price, 2, '.', ' ')}}</td>
                <td> <form action="{{route('cart.store', $item->Product->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">+</button>
                </form>
                <p>{{ $item->units }}</p>
                <form action="{{ route('cart.destroy', $item->Product->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-primary btn-sm">-</button>
                </form>
            </td>
                <td>R$ {{number_format($item->Product->price * $item->units, 2, '.', ' ')}}</td>
            </tr>
            @endforeach
          </table>
        </section>

    </main>
    @endif
</body>
