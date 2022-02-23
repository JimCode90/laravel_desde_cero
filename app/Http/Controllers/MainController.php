<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('welcome', compact('productos'));
    }
}
