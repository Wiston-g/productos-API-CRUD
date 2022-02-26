<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\productsImage;

class productImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products=productsImage::all();
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
        $carpetaGuardado="/public/productImg".$request->name_file;
        try {
            if(!$request->hasFile('archivo')){
                return response()->json(['message' =>'no file'],400);
            }else{
                $archivo = $request->file('archivo')->store($carpetaGuardado); 
                $nombreArchivo = $request->file('archivo')->getClientOriginalName();
                $extension = $request->file('archivo')->extension();
                $url = Storage::url($archivo);


                $productsImage = new productsImage();
                $productsImage->name_file = $nombreArchivo;
                $productsImage->extension = $extension;
                $productsImage->url = $url;
            
                $save = $productsImage->save();
                
                if(!$save){
                    return response()->json(['message' => 'Bad request'], 500);
                }else{
                    return response()->json(['message' => 'Registro exitoso','data'=> $productsImage], 201);
                }
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $productsImage = productsImage::findOrFail($request->id);
            $productsImage->name_file = $request->nombre;
            $productsImage->extension = $request->extension;
            $productsImage->url = $request->url;
        
            $save = $productsImage->save();
            
            if(!$save){
                return response()->json(['message' => 'Bad request'], 500);
            }else{
                return response()->json(['message' => 'Registro exitoso','data'=> $productsImage], 201);
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
    public function destroy($id)
    {
        try{
            productsImage::destroy($id);
        }catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 409);
        }
    }
}
