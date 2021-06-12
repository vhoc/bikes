<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param integer   $product_type
     * @return \Illuminate\Http\Response
     */
    public function index( $product_type = null )
    {

        return response()->json( Product::all() );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $newProduct = new Product;

        $newProduct->product_type_id    = $request->product_type_id;
        $newProduct->product_brand_id   = $request->product_brand_id;
        $newProduct->model              = $request->model;
        $newProduct->year_model         = $request->year_model;
        $newProduct->serial             = $request->serial;
        $newProduct->wheel_size         = $request->wheel_size;
        $newProduct->color_id           = $request->color_id;
        $newProduct->description        = $request->description;
        $newProduct->images             = $request->images;
        $newProduct->acquired           = $request->acquired;
        $newProduct->last_maintenance   = $request->last_maintenance;
        $newProduct->due_maintenance    = $request->due_maintenance;

        if( $newProduct->save() )
        {
            return response( [
                'message' => 'Product created successfully',
                'code' => 201
            ], 201 );
        }
        return response( [
            'message' => 'Error creating product.',
            'code' => 400
        ] );


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json( Product::find( $product->id ) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->product_type_id    = $request->product_type_id;
        $product->product_brand_id   = $request->product_brand_id;
        $product->model              = $request->model;
        $product->year_model         = $request->year_model;
        $product->serial             = $request->serial;
        $product->wheel_size         = $request->wheel_size;
        $product->color_id           = $request->color_id;
        $product->description        = $request->description;
        $product->images             = $request->images;
        $product->acquired           = $request->acquired;
        $product->last_maintenance   = $request->last_maintenance;
        $product->due_maintenance    = $request->due_maintenance;

        if( $product->save() )
        {
            return response( [
                'message' => 'Product updated successfully',
                'code' => 200
            ], 200 );
        }
        return response( [
            'message' => 'Error updating product.',
            'code' => 400
        ] );
    }

    /**
     * Remove the specified resource from storage.
     * If the resource is soft-deleted, this method will restore it.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if( $product->delete() )
        {
            return response( [
                'message' => 'Product deleted successfully',
                'code' => 200
            ], 200 );
        }
        return response( [
            'message' => 'Error deleting product.',
            'code' => 400
        ] );
    }

}
