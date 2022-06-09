<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart;
use Carbon\Carbon;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function store(Request $request){
        $pedido = Order::create([
            'user_id' => Auth()->user()->id,
            'email' => $request->email,
        ]);

        $usuario = Auth()->user()->id;
        $data = Carbon::now();
        $data->format('l jS \\of F Y h:i:s A');

        $carrinho = Cart::where('user_id', $usuario);

        foreach($carrinho->get() as $item){
            $pedido->Products()->attach([
                $item->product_id => [
                    'name' => $item->Product->name,
                    'price' => $item->Product->price,
                    'units' => $item->units,
                    'user_id' => $usuario,
                    'state' => 'Em andamento',
                    'created_at' => $data,
                    'total' => $request->total,
                    'productImage' => $item->Product->image,
                    'description' => $item->Product->description,
                    'productPrice' => $item->Product->price
                ]
            ]);
        }

        $carrinho->delete();
        return redirect(route('perfil.index'));
    }
}
