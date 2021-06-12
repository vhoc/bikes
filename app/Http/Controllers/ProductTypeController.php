<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductTypeRequest;

class ProductTypeController extends Controller
{

    private $resourceName = 'Product type';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( ProductType::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeRequest $request)
    {
        $validated = $request->validated();

        $newProductType = new ProductType;

        $newProductType->name = $request->name;

        if( $newProductType->save() )
        {
            return response( [
                'message' => $this->resourceName . ' created successfully',
                'code' => 201
            ], 201 );
        }
        return response( [
            'message' => 'Error creating ' . $this->resourceName . '.',
            'code' => 400
        ] );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        return response()->json( ProductType::find( $productType->id ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductTypeRequest $request, ProductType $productType)
    {
        $validated = $request->validated();

        $productType->name = $request->name;

        if( $productType->save() )
        {
            return response( [
                'message' => $this->resourceName . ' updated successfully',
                'code' => 200
            ], 200 );
        }
        return response( [
            'message' => 'Error updating ' . $this->resourceName . '.',
            'code' => 400
        ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        if( $productType->delete() )
        {
            return response( [
                'message' => $this->resourceName . ' deleted successfully',
                'code' => 200
            ], 200 );
        }
        return response( [
            'message' => 'Error deleting ' . $this->resourceName . '.',
            'code' => 400
        ] );
    }
}
