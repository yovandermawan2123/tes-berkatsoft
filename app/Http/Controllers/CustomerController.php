<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\facades\Validator;
use \Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Customer::orderBy('name', 'asc')->get();
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
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:225",
            "address" => "required",
            "no_telephone" =>"required|numeric",
           
        ]);

      
        

      

     
        try {
            $customer =  Customer::create($validatedData);
         $response = [
             'message' => 'Product created',
             'request' => $customer
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Customer::find($id);
        return response()->json([
            'status' => 200,
            'request' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $validatedData = $request->validate([
            "name" => "required|max:225",
            "address" => "required",
            "no_telephone" =>"required|numeric",
           
           
        ]);
     
        try {
            $customer =  Customer::where('id', $request->id)
            ->update($validatedData);
         $response = [
             'message' => 'Update Berhasil',
             'request' =>  $customer
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $destroyProduct = Customer::where('id', $id)->delete();
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
