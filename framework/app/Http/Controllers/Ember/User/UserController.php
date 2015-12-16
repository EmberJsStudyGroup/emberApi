<?php

namespace App\Http\Controllers\Ember\User;

use App\Models\User\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Datatables;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // varianta simpla
        $users = User::all()->map(function ($item, $key) {
            $item->links = ['addresses' => 'addresses'];
            return $item;
        });
        return response()->json(['users' => $users]);

        // varianta cu datatables
        return Datatables::of(User::select('*'))
            ->addColumn('links', function ($user) {
                return ['addresses' => 'addresses'];
            })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $requestData = $request->input('user');
        if ($requestData) {
            $user = User::create($requestData);
            if ($user) {
                return response()->json(['user' => $user]);
            }
        }

        return response()->json('informatia nu s-a salvat', 500);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = User::where(['id' => $id])->first();
        if ($user) {
            $userAttributes = $user->attributesToArray();
            $userAttributes['links'] = ['addresses' => 'addresses'];

            return response()->json(['user' => $userAttributes]);
        }

        return response()->json([]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $requestData = $request->input('user');
            foreach ($requestData as $fieldName => $fieldValue) {
                $user->{$fieldName} = $fieldValue;
            }

            if ($user->save()) {
                return response()->json(['user' => $user]);
            }
        }

        return response()->json('informatiile nu s-au salvat', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->delete()) {
                return response()->json(true);
            }
        }

        return response()->json('userul nu s-a putut sterge', 500);
    }
}
