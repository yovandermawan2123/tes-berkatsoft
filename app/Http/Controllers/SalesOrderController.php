<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;
use App\Http\Requests\StoreSalesOrderRequest;
use App\Http\Requests\UpdateSalesOrderRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\facades\Validator;
use \Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesorder = SalesOrder::orderBy('no_salesorder', 'asc')->with('product', 'customer')->get();
        $response = [
         //    'message' => 'List Products Order By Name',
        'request' => $salesorder
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
     * @param  \App\Http\Requests\StoreSalesOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesOrderRequest $request)
    {
        $validatedData = $request->validate([
            "no_salesorder" => "required",
            "id_customer" => "required",
            "id_product" =>"required",
            "quantity" => "required|numeric",
            "id_customer" => "required",
            "subtotal" =>"required",
           
           
        ]);

     
        try {
            $product =  SalesOrder::create($validatedData);
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
     * @param  \App\Models\SalesOrder  $salesOrder
     * @return \Illuminate\Http\Response
     */
    public function show(SalesOrder $salesOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesOrder  $salesOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salesorder = SalesOrder::find($id);
        return response()->json([
            'status' => 200,
            'request' => $salesorder
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesOrderRequest  $request
     * @param  \App\Models\SalesOrder  $salesOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesOrderRequest $request, SalesOrder $salesOrder)
    {
        $validatedData = $request->validate([
            "no_salesorder" => "required",
            "id_customer" => "required",
            "id_product" =>"required",
            "quantity" => "required",
            "id_customer" => "required",
            "subtotal" =>"required",
           
           
        ]);

     
        try {
            $product =  SalesOrder::where('id', $request->id)
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
     * @param  \App\Models\SalesOrder  $salesOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $destroyProduct = SalesOrder::where('id', $id)->delete();
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
