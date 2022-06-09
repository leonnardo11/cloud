<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    //
    public function index(){
        $pedidos = Order_product::where('user_id', Auth()->user()->id)->take(10)->get();
            return view('dashboard')->with('pedidos', $pedidos);
    }

    public function Profile(){
        return view('user.editProfile');
    }


    public function edit(Request $request){
        $user = Auth::user();
        $image = $request->file('image');

        if($request->image){
            $path = 'storage/'. Storage::putFile('User', $image);
        }
        else{
            $path = Auth::user()->image;
        }
        $user->update([
            'name' => $request->name,
            'image' => $path,
            'tel' => $request->tel,
        ]);
        session()->flash('sucess', 'Perfil salvo com sucesso.');
        return redirect()->back();
    }

}
