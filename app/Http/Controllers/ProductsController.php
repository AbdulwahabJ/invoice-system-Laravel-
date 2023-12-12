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
        return view('products.products', compact(['sections', 'products']));

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
            'section_id' => 'required',
            'description' => 'required',
        ], [
                'product_name.required' => 'يرجى ادخال اسم المنتج',
                'product_name.unique' => ' اسم المنتج موجود مسبقا',
                'section_id.required' => 'يرجى اختيار اسم القسم',
                'description.required' => 'يرجى ادخال الملاحظات',
            ]
        );


        $input = $request->all();

        products::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'section_id' => $request->section_id,
        ]);
        session()->flash('Add_product', 'تم اضافة المنتج بنجاح');
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
    public function update(Request $request)
    {
        $pro_id = $request->pro_id;
        $validated = $request->validate([
            'product_name' => 'required|unique:products,product_name|max:255' . $pro_id,
            'description' => 'required',
        ], [
                'product_name.required' => 'يرجى ادخال اسم المنتج',
                'product_name.unique' => ' اسم المنتج موجود مسبقا',
                'description.required' => 'يرجى ادخال الملاحظات',
            ]
        );
        $id = sections::where('section_name', $request->section_name)->first()->id;
        $product = products::findOrFail($request->pro_id);
        $product->update([
            'product_name' => $request->product_name,
            'section_name' => $id,
            'description' => $request->description,
        ]);
        session()->flash('edit', 'تم تعديل المنتج بنجاح');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->pro_id;
        products::findOrFail($id)->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return back();
    }
}
