<?php

namespace App\Http\Controllers\Ember\User;

use App\Models\User\Address;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int $userId
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        $address = Address::where(['userId' => $userId])->get();
        if ($address) {
            return response()->json(['user-address' => $address]);
        }

        return response()->json([]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int $userId
     *
     * @return \Illuminate\Http\Response
     */
    public function create($userId)
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
        $requestData = $request->input('userAddress');
        if ($requestData['user']) {
            $requestData['userId'] = $requestData['user'];
            $requestData['countyId'] = 1;
            unset($requestData['user']);

            $address = Address::create($requestData);
            if ($address) {
                return response()->json(['userAddress' => $address]);
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
        $requestData = $request->input('userAddress');
        $address = Address::where(['id' => $id, 'userId' => $requestData['user']])->first();
        if ($address) {
            unset($requestData['user']);
            foreach ($requestData as $fieldName => $fieldValue) {
                $address->{$fieldName} = $fieldValue;
            }

            if ($address->save()) {
                return response()->json(['userAddress' => $address]);
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
        $address = Address::find($id);
        if ($address) {
            if ($address->delete()) {
                return response()->json(true);
            }
        }

        return response()->json('adresa nu s-a putut sterge', 500);
    }
}
