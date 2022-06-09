<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //

    function index(){
        return view('user.control')->with('usuarios', User::all());
    }

    function create(){
        return view('user.create');
    }
}
