<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::all();
        $sections = sections::all();
        return view('products.products',compact(['sections','products']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'section_id'=>'required',
            'description' => 'required',
        ], [
                'product_name.required' => 'يرجى ادخال اسم المنتج',
                'product_name.unique' => ' اسم المنتج موجود مسبقا',
                'section_id.required'=>'يرجى اختيار اسم القسم',
                'description.required' => 'يرجى ادخال الملاحظات',
            ]
        );


        $input = $request->all();

        products::create([
            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'section_id'=>$request->section_id,
        ]);
        session()->flash('Add_product','تم اضافة المنتج بنجاح');
        return redirect('products');



    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $products)
    {
        //
    }
}
