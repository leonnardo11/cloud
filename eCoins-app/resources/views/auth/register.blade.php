<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <main>
        <div class="container-login">
            <div class="login-text">
                <h1 class="login-h1">Cadastre-se</h1>
                <p class="login-p">Cadastre-se no ECOIN</p>
                <x-auth-validation-errors class="error" :errors="$errors" />
                <form class="login-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="text" name="name" id="name" :value="old('name')" placeholder="Insira seu nome" required autofocus>
                    <input type="email" name="email" id="email" placeholder="Insira seu Email" title="é necessário inserir um email" :value="old('email')" required />
                    <input type="password" name="password" id="password" placeholder="Insira sua senha" autocomplete="new-password" required>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="repita sua senha" required />
                    <input type="tel" name="tel" id="tel" placeholder="Insira o seu telefone" required>
                    <button type="submit" name="myButton" value="foo"> {{ __('Register') }}</button>
                </form>
                <p>Já tem uma conta? <a href="{{ route('login') }}">{{ __('Faça Login') }}</a></p>
            </div>
            <div class="login-image">
                <img src="{{ asset('images/Rectangle 40.png') }}" alt="Personagem do Counter Strike GO"
                    title="Personagem do Counter Strike Go">
            </div>
        </div>
    </main>

</body>

</html>
