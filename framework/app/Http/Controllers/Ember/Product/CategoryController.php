<?php

namespace App\Http\Controllers\Ember\Product;

use App\Models\Product\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Datatables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        if ($categories) {
            return response()->json(['categories' => $categories]);
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
        $requestData = $request->input('category');
        if ($requestData) {
            $category = Category::create($requestData);
            if ($category) {
                return response()->json(['category' => $category]);
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
        $category = Category::find($id);
        if ($category) {
            $requestData = $request->input('category');
            foreach ($requestData as $fieldName => $fieldValue) {
                $category->{$fieldName} = $fieldValue;
            }

            if ($category->save()) {
                return response()->json(['category' => $category]);
            }
        }

        return response()->json('informati nu s-a salvat', 500);
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
        $category = Category::with('products')->find($id);
        if ($category && $category->products->isEmpty()) {
            if ($category->delete()) {
                return response()->json(true);
            }
        }

        return response()->json('informatia nu s-a putut sterge', 500);
    }
}
