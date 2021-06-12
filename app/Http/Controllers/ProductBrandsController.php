<?php

namespace App\Http\Controllers;

use App\Models\ProductBrand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductBrandsRequest;

class ProductBrandsController extends Controller
{

    private $resourceName = 'Product brand';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( ProductBrand::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductBrandsRequest $request)
    {
        $validated = $request->validated();

        $newResource = new ProductBrand;

        $newResource->name = $request->name;

        if( $newResource->save() )
        {
            return response( [
                'message' => $this->resourceName .' created successfully',
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
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBrand $productBrand)
    {
        return response()->json( ProductBrand::find( $productBrand->id ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBrand $productBrand)
    {
        $validated = $request->validated();

        $productBrand->name = $request->name;

        if( $productBrand->save() )
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
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBrand $productBrand)
    {
        if( $productBrand->delete() )
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
