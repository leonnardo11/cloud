<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Perfil {{Auth::user()->name}}</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <header>
        @include('layouts.navigation')
        <main>
            <div class="edit-container">
                <div class="form-edit">
                    <form method="POST" action="{{route('perfil.edit')}}" enctype="multipart/form-data">
                        @csrf
                    <fieldset>
                        <img src="{{asset(Auth::user()->image)}}"
                        alt="Foto do usuário(a) {{ Auth::user()->name }}" title="Foto do usuário(a) {{ Auth::user()->name }}">
                    <br>
                      <label for="name">Usuário:</label>
                      <input type="text" name="name" id="name" value="{{ Auth::user()->name}}">
                    </fieldset>
                    <fieldset>
                      <label for="value">Email</label>
                      <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                      <label for="stock">Telefone: </label>
                      <input type="text" name="tel" id="tel" value="{{ Auth::user()->tel }}">
                      <label for="image">Foto de Perfil</label>
                      <input type="file" name="image" id="image">
                    </fieldset>
                    <button type="submit" class="formButton">Atualizar perfil </button>
                    
                  </form>
                </div>
              </div>
        </main>

</body>
