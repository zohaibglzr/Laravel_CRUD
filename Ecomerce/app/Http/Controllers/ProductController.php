<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\product;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::find(1);
        return $products->customers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $products = product::find(4);
       $products->customers()->sync([3,4]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try{
            // $products = product::create([
            //     'name' => $request->name,
            //     'discription' => $request->discription,
            //     'price' => $request->price,
            //     'quantity' => $request->quantity,
            // ]);
            //the line below works same as above commented code
            $products = Product::create($request->validated());
            
            return response()->json([
                'message' => 'Product Added',
                'Product_Details' => $products,
            ], 201);
        }catch(Exception $e){
            return Helper::exceptionError($e);
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
        try{
            $products = product::find( $id);
            return response()->json([
                'message' => 'Product Details',
                'Product_Details' => $products,
            ], 200);
         }catch(Exception $e){
            return Helper::exceptionError($e);
        }
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
    public function update(Request $request, $id)
    {
        $products = product::find($id)->update([
            'name' => $request->name,
            'discription' => $request->discription,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        return response()->json([
            'message' => 'Updated',
            'New_Details' => $products
        ],  200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = product::find($id);
        if($products){
                    //for soft delete 
                    // $product->delete();
            //for parmanent delete
            $products->forceDelete();
            return response()->json([
                'message' => "Kaam Tammam"
            ]);
        }elseif(!$products){
            return response()->json([
                'message' => "Product not found"
            ]);
        }
        
        
    }
    
}
