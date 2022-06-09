<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    function index(){
        $itens = Cart::where('user_id', Auth()->user()->id)->get();
        return view('cart.index')->with('itens', $itens);
    }


    function store(Product $product) {
        $user = Auth()->user();

        $cart = Cart::where([
            'user_id' => $user->id,
            'product_id' => $product->id])->first();

        if ($cart){
            $cart->update([
                'units' => $cart->units + 1
            ]);
        }
        else{
            $cart = Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'units' => 1
            ]);
        }
        session()->flash('sucess', 'O produto ('.$product->name.') foi adicionado ao carrinho.');
        return redirect()->back();
    }

    function destroy(Product $product){
        $user = Auth()->user();

        $cart = Cart::where([
            'user_id' => $user->id,
            'product_id' => $product->id])->first();

        if(!$cart){
            session()->flash('error', 'O produto ('.$product->name.') já foi foi removido do carrinho.');
            return redirect()->back();
        }
        if($cart->units > 1){
            $cart->update([
                'units' => $cart->units - 1
            ]);
            session()->flash('quantRemove', 'O produto ('.$product->name.') foi atualizado.');
        }
        else{
            $cart->delete();
            session()->flash('removed', 'O produto ('.$product->name.') foi removido do carrinho.');

        }
        return redirect()->back();
    }
}

