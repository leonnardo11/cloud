
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Produto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<header>
@include('layouts.navigation')
<div class="main-div">
    <h1>Editar {{$products->name}}</h1>
    <p>Você está editando o Produto {{$products->name}}. Verifique as Informações antes de salvar.</p>
  </div>
</header>
<main>
  <div class="edit-container">
    <div class="form-edit">
        <form action="{{route('product.update', $products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
        <fieldset>
            <img src="{{asset($products->image)}}">
          <label for="name">Nome do Produto</label>
          <input type="text" name="name" id="name" value="{{$products->name}}">
        </fieldset>
        <fieldset>
          <label for="value">Valor</label>
          <input type="number" name="price" id="price" value="{{$products->price}}">
          <label for="stock">Quantidade</label>
          <input type="text" name="stock" id="stock" value="{{$products->stock}}">

          <label for="image">Imagem do Produto</label>
          <input type="file" name="image" id="image" >
        </fieldset>
        <fieldset>
          <label for="description">Descrição</label>
          <textarea name="description" id="description" cols="30" rows="10" minlength="1" maxlength="250" required>{{$products->description}}</textarea>
          <label for="category">Categoria:</label>
          <select name="category_id" id="category">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>
        </fieldset>
        <button type="submit" class="formButton">Salvar</button>
      </form>
    </div>
  </div>
</main>
