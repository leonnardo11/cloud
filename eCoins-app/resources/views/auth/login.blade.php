<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/cdn/css/style.css') }}">
</head>

<body>
    <main>
        <div class="container-login">
            <div class="login-text">
                <p style="color: red; font-size: 20px; font-shadow: 2px 2px 3px black;"> {{session()->get('notLoggedIn')}} </p>
                <h1 class="login-h1">ECOIN - LOGIN</h1>
                <p class="login-p">Insira suas Credenciais</p>
                <!-- Session Status -->
                <x-auth-session-status :status="session('status')" />
                <!-- Validation Errors -->
                <x-auth-validation-errors :errors="$errors" class="error"/>

                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="email" name="email" :value="old('email')" placeholder="Digite o seu email" required autofocus />
                    <input type="password" name="password" placeholder="Digite a sua senha" required autocomplete="current-password">
                    <button type="submit">{{ __('Entrar') }}</button>
                </form>
                <p>Não tem uma conta? <a href="{{ route('register') }}">Registre-se</a></p>
            </div>
            <div class="login-image">
                <img src="{{ asset('images/Rectangle 40.png') }}" alt="Personagem do Counter Strike GO"
                    title="Personagem do Counter Strike Go">
            </div>
        </div>
    </main>

</body>

</html>
