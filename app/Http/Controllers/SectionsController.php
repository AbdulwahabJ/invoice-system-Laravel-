<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        return view('sections.section',compact('sections'));
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
            'section_name' => 'required|unique:sections|max:255',
            'description' => 'required',
        ], [
            'section_name.required' => 'يرجى ادخال اسم القسم',
             'section_name.unique' => ' اسم القسم موجود مسبقا',
             'description.required' => 'يرجى ادخال الملاحظات',
            ]
        );


        $input = $request->all();

            sections::create([
                'section_name'=>$request->section_name,
                'description'=>$request->description,
                'Created_by'=>(Auth::User()->name),
            ]);
            session()->flash('Add','تم اضافة القسم بنجاح');
            return redirect('sections');


    }

    /**
     * Display the specified resource.
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request )
    {
        $id = $request->id;
        $validated = $request->validate([
            'section_name' => 'required|unique:sections,section_name|max:255'.$id,
            'description' => 'required',
        ], [
                'section_name.required' => 'يرجى ادخال اسم القسم',
                'section_name.unique' => ' اسم القسم موجود مسبقا',
                'description.required' => 'يرجى ادخال الملاحظات',
            ]
        );

        $section=sections::find($id);
        $section->update([
            'section_name'=>$request->section_name,
            'description'=>$request->description,
        ]);

        session()->flash('edit','تم التعديل بنجاح');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        sections::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return back();
    }
}


//============================================================================

/*
   *   $input = $request->all();

  $b_exists = sections::where('section_name' ,$input['section_name'])->exists();

  if($b_exists){
      session()->flash('Error','اسم القسم مسجل من قبل');
      return redirect('sections');
  }
  else{
      sections::create([
          'section_name'=>$request->section_name,
          'description'=>$request->description,
          'Created_by'=>(Auth::User()->name),
      ]);
      session()->flash('Add','تم اضافة القسم بنجاح');
      return redirect('sections');
  }
   *
   * */
