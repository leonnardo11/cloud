<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function index (Product $product){
        return view('product.index')->with(['products' => Product::all(), 'categories' => Category::all()]);
    }

    public function create(){
        return view('/product/create')->with(['categories' => Category::all()]);
    }

    public function store(Request $request){
        $image = "/storage/".$request->file('image')->store('itens'); //salva a imagem no storage e retorna o caminho
        $product = Product::create([ //cria um novo produto no banco de dados com os dados do formulário e o caminho da imagem salva no storage no banco de dados
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'image' => $image,
        ]);
        session()->flash('success','Produto Criado com Sucesso!');
        return redirect(route('product.index'));
    }

    public function destroy(Product $product){
        $product->delete();
        session()->flash('sucess', 'Produto removido com sucesso');
        return redirect(route('product.index'));
    }

    public function edit(Product $product, Category $categories){

        return view('product.edit')->with(['products'=> $product,
                                            'categories'=> Category::all()]);
    }

    public function update(Product $product, Request $request){
        if($request->image){
            $image = "/storage/".$request->file('image')->store('itens');
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'image' => $image
            ]);
        }
        else
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
            ]);
        session()->flash('success','Produto Editado com Sucesso!');
        return redirect(route('product.index'));
    }

}
