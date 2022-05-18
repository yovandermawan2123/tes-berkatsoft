<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\facades\Validator;
use \Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'asc')->get();
        $response = [
         //    'message' => 'List Products Order By Name',
        'request' => $products
     ];
        return response()->json($response, Response::HTTP_OK);
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

     
        $validatedData = $request->validate([
            "name" => "required",
            "price" => "required|numeric",
            "is_ready" =>"in:1,2",
           
        ]);

      
        

      

     
        try {
            $product =  Product::create($validatedData);
         $response = [
             'message' => 'Product created',
             'request' => $product
         ];


         return response()->json($response, Response::HTTP_CREATED);
       
         } catch (QueryException $e) {
             return response()->json([
                 'message' => "Failed " . $e->errorInfo
             ]);
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json([
            'status' => 200,
            'request' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "price" => "required|numeric",
            "is_ready" =>"in:1,2",
           
        ]);
     
        try {
            $product =  Product::where('id', $request->id)
            ->update($validatedData);
         $response = [
             'message' => 'Update Berhasil',
             'request' => $product
         ];


         return response()->json($response, Response::HTTP_CREATED);
       
         } catch (QueryException $e) {
             return response()->json([
                 'message' => "Failed " . $e->errorInfo
             ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $destroyProduct = Product::where('id', $id)->delete();
    $response = [
        'request' => $destroyProduct

    ];
    return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo
            ]);
       }
     
    
    }
    }

