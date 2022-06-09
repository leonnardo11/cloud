
<nav style="box-shadow: 2px 3px 4px black;">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>

    <a href="{{ url('/') }}"><label class="logo">ECOINS</label></a>
    <ul>
        @if (Route::has('login'))
            @auth
            <div class="search-container">
                <form action="/search">
                  <input type="text" id="query" placeholder="Pesquise Algo..." name="query" required>
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
                    @if(Auth::user()->admin == 1)
                    <div class="dropdown">
                    <li><a class="">Painel do Administrador</a></li>
                    <div class="dropdown-content">
                        <p><a href="{{ route('product.index') }}" class="">Produtos</a></p>
                        <p><a href="{{ route('category.index') }}" class="">Categorias</a></p>
                    </div>
                  </div>
                  @endif
                  <li><a href="{{ route('cart.index') }}">Carrinho</a></li>
                  <div class="dropdown">
                    <li><a class="active">Oi, {{ Auth::user()->name }}</a></li>
                    <div class="dropdown-content">
                        <p><a href="{{ route('perfil.index') }}" class="">Meu Perfil</a></p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                         <p><button type="submit" class="logout-button">Deslogar</button></p>
                        </form>
                    </div>
                  </div>
            @else
                <div class="search-container">
                    <form action="/search">
                      <input type="text" id="query" placeholder="Pesquise Algo..." name="query" minlength="3" maxlength="69" required>
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                  </div>
                <li><a href="{{ route('cart.index')}}">Carrinho</a></li>
                <li><a href="{{ route('login') }}" class="">Entrar</a></li>
            @endauth
        @endif

    </ul>
</nav>
