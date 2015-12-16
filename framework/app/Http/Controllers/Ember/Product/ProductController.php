<?php

namespace App\Http\Controllers\Ember\Product;

use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Datatables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::select(['products.id',
                                     'products.name',
                                     'products.image',
                                     'products.active',
                                     'products.position',
                                     'products_categories.name as category',])
            ->join('products_categories', 'products_categories.id', '=', 'products.categoryId');

        return Datatables::of($products)
//            ->addColumn('links', function () {
//                    return [
//                        'relatie' => 'relatie'
//                    ];
//            })
            ->addColumn('active', function ($product) {
                return $product->active ? '<i class="fa fa-check-square-o"></i>' : '<i class="fa fa-square-o"></i>';
            })->make(true);
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
        $requestData = $request->input('product');
        if ($requestData) {
            $product = Product::create($requestData);
            if ($product) {
                return response()->json(['product' => $product]);
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
        $product = Product::find($id);
        if ($product) {
            $productAttributes = $product->attributesToArray();
            $productAttributes['links'] = ['addresses' => 'addresses'];

            return response()->json(['product' => $productAttributes]);
        }
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
        $product = Product::find($id);
        if ($product) {
            $requestData = $request->input('product');
            foreach ($requestData as $fieldName => $fieldValue) {
                $product->{$fieldName} = $fieldValue;
            }

            if ($product->save()) {
                return response()->json(['product' => $product]);
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
        $product = Product::find($id);
        if ($product) {
            if ($product->delete()) {
                return response()->json(true);
            }
        }

        return response()->json('informatia nu s-a putut sterge', 500);
    }
}
