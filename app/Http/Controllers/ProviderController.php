<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProviderRequest;

class ProviderController extends Controller
{

    private $resourceName = 'Provider';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Provider::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProviderRequest $request)
    {
        $validated = $request->validated();

        $newResource = new Provider;

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
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return response()->json( Provider::find( $provider->id ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $validated = $request->validated();

        $provider->name = $request->name;

        if( $provider->save() )
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
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        if( $provider->delete() )
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
