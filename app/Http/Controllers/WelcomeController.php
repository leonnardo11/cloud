<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index ()
    {
        return view('welcome')->with(['products' => Product::all(), 'categories' => Category::all()]);
    }

    function detail($id){
        $data = Product::find($id);
        return view('product.detail', ['products' => $data]);
    }

    function search(Request $req){
       $data = Product::where('name', 'like', '%'.$req->input('query').'%')->get();
       return view('product.search', ['products' => $data]);
    }
}
