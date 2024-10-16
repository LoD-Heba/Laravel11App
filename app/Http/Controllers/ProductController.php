<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
/**
* @OA\Info(title="API Usuarios", version="1.0")
*
* @OA\Server(url="http://swagger.local")
*/
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
    * @OA\POST(
    *     path="/api/product",
    *     summary="Guarda a los productos en base de datos",
    *     @OA\Response(
    *         response=200,
    *         description="Productos guardados!!."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $product=Product::create(["name"=>"test","price"=>123]);
        return response()->json([
            "mensaje"=>"Datos guardados!!"
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
