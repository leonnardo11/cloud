<div class="products">
    @if (count($products) == false)
    <p class="noProduct">Nenhum Produto Encontrado.</p>
    @else
    @foreach($products as $product)
    <div class="card">
        <div class="imgBox">
            @if($product->image)
            <img src="{{ asset($product->image) }}" alt="{{$product->name}}" class="product">
            @else
            <img src="{{ asset('images/404.png') }}" alt="Imagem não encontrada" class="product" title="Imagem não encontrada">
            @endif
        </div>
        <div class="contentBox">
            <h3>{{$product['name']}}</h3>
            <h2 class="price">R$ {{$product['price']}}</h2>
            <a href="detail/{{$product['id']}}" class="buy">Ver mais</a>
        </div>
    </div>
    @endforeach
</div>
@endif

