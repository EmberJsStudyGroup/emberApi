<?php

namespace App\Http\Controllers\Ember\Product;

use App\Models\Product\Provider;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
        if ($providers) {
            return response()->json(['providers' => $providers]);
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
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->input('provider');
        if ($requestData) {
            $provider = Provider::create($requestData);
            if ($provider) {
                return response()->json(['provider' => $provider]);
            }
        }

        return response()->json('informatia nu s-a salvat', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provider = Provider::find($id);
        if ($provider) {
            $requestData = $request->input('provider');
            foreach ($requestData as $fieldName => $fieldValue) {
                $provider->{$fieldName} = $fieldValue;
            }

            if ($provider->save()) {
                return response()->json(['provider' => $provider]);
            }
        }

        return response()->json('informatia nu s-a salvat', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::with('products')->find($id);
        if ($provider && $provider->products->isEmpty()) {
            if ($provider->delete()) {
                return response()->json(true);
            }
        }

        return response()->json('informatia nu s-a putut sterge', 500);
    }
}
