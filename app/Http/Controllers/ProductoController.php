<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth')->only('index');
        $this->middleware('auth')->except(['index', 'create']);
    }

    public function index()
    {
//        $productos = DB::table('productos')->get();
        $productos = Producto::all();
//        return $productos;
//        dd($productos);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

//    public function show($producto){
    public function show(Producto $producto){ //INYECCIÓN IMPLÍCITA DE MODELOS
//        $producto = DB::table('productos')->where('id', $producto)->first();
//        $producto = DB::table('productos')->find($producto);
//        $producto = Producto::findOrFail($producto);
//        dd($producto);
        return view('productos.show', compact('producto'));
    }

    public function store(ProductoRequest $productoRequest)
    {
//        $producto = Producto::create([
//            'title' => request()->title,
//            'description' => request()->description,
//            'price' => request()->price,
//            'stock' => request()->stock,
//            'status' => request()->status,
//        ]);

        /**
         * Validando formulario
         */
//        $rules = [
//            'title' => ['required', 'max:255'],
//            'description' => ['required', 'max:1000'],
//            'price' => ['required', 'min:1'],
//            'stock' => ['required', 'min:0'],
//            'status' => ['required', 'in:available,unavailable'],
//        ];

//        request()->validate($rules);

//        if ($productoRequest->status == 'available' && $productoRequest->stock == 0) {
//            //session()->put('error', 'debe tener un stock'); //creamos la sesion
////            session()->flash('error', 'debe tener un stock'); //Añadimos al withError()
//            return redirect()
//                ->back()
//                ->withInput($productoRequest->all())
//                ->withErrors('debe tener un stock');
//        }
//        dd($productoRequest->all(), request()->all(), $productoRequest->validated());

//        session()->forget('error'); //remover la sesion

        $producto = Producto::create($productoRequest->validated());

//        return redirect()->back();
//        return redirect()->action([ProductoController::class, 'index']);
//        session()->flash('success', "El producto con id {$producto->id} fue creado"); //Añadimos al metodo withSuccess
        return redirect()
            ->route('productos.index')
//            ->with(['success' => "El producto con id {$producto->id} fue creado"])
            ->withSuccess("El producto con id {$producto->id} fue creado");
    }

//    public function edit($producto)
    public function edit(Producto $producto)
    {
//        $producto = Producto::findOrFail($producto);
        return view('productos.edit', compact('producto'));
    }

//    public function update($producto)
    public function update(ProductoRequest $productoRequest, Producto $producto)
    {
//        $rules = [
//            'title' => ['required', 'max:255'],
//            'description' => ['required', 'max:1000'],
//            'price' => ['required', 'min:1'],
//            'stock' => ['required', 'min:0'],
//            'status' => ['required', 'in:available,unavailable'],
//        ];
//
//        request()->validate($rules);

//        if (request()->status == 'available' && request()->stock == 0) {
//            //session()->put('error', 'debe tener un stock'); //creamos la sesion
//            session()->flash('error', 'debe tener un stock');
//            return redirect()->back()->withInput(request()->all());
//        }


//        $producto = Producto::findOrFail($producto);
        $producto->update($productoRequest->validated());

        return redirect()
            ->route('productos.index')
            ->withSuccess("El producto con id {$producto->id} fue editado");

    }

//    public function destroy($producto)
    public function destroy(Producto $producto)
    {
//        $producto = Producto::findOrFail($producto);
        $producto->delete();
        return redirect()
            ->route('productos.index')
            ->withSuccess("El producto con id {$producto->id} fue eliminado");
    }
}
