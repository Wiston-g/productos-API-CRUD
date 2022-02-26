<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products=Products::all();
            return response()->json(['message' => 'Todo Ok','data'=> $products], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $products = new Products();
            $products->name = $request->data['nombre'];;
            $products->description_id = $request->data['descripcion'];
            $products->reference = $request->data['referencia'];
            $products->price = $request->data['precio'];
            $products->amount = $request->data['cantidad'];

            $products->imageProduct_id = $request->data['imagenProducto'];
            $save = $products->save();
            
            if(!$save){
                return response()->json(['message' => 'Bad request'], 500);
            }else{
                return response()->json(['message' => 'Registro exitoso','data'=> $products], 201);
            }
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 409);

        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            
            $products = Products::findOrFail($id);
            
            if(!$products){
                return response()->json(['message' => 'Bad request'], 500);
            }else{
                return response()->json(['message' => 'Registro exitoso','data'=> $products], 201);
            }
        }catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 409);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $products = Products::findOrFail($request->id);
            $products->name = $request->data['nombre'];;
            $products->description_id = $request->data['descripcion'];
            $products->reference = $request->data['referencia'];
            $products->price = $request->data['precio'];
            $products->amount = $request->data['cantidad'];

            $products->imageProduct_id = $request->data['imagenProducto'];
            $save = $products->save();
            
            if(!$save){
                return response()->json(['message' => 'Bad request'], 500);
            }else{
                return response()->json(['message' => 'Registro exitoso','data'=> $products], 201);
            }
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 409);

        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            Products::destroy($request->id);
            
        }catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 409);
        }
    }
}
