<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all(); //all = llama a todos los productos
        //$product = Product::where("id","=",1)->get(); //llama solo al id = 1 
        //$product = Product::where("id","=",3)->orWhere("id","=",2)->get(); //en este caso llama al id 3 o 'orWhere' al id 2
        return response()->json($product); // esto llama los datos de la tabla al index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $product = Product::create([ 
            "nombre"=>$request->nombre, //$request para pedir los datos desde fuera
            "precio"=>$request->precio
        ]);
        return response()->json([
            "mensaje"=>"¡Datos guardados!"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    { 
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //$product ->nombre = "Pedro"; //para editar o actualizar un producto 
        $product ->nombre = $request->nombre;
        $product ->precio = $request->precio;
        $product->save();

        return response()->json([
            "mensaje"=>"¡Datos actualizados!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) 
    {
        $product->delete();

        return response()->json([
            "mensaje"=>"¡Datos eliminados!"
        ]);
    }
}
