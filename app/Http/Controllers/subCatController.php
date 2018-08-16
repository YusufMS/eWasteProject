<?php

namespace App\Http\Controllers;
use App\sub_waste_category;
use App\main_waste_category;
use DB;
use Illuminate\Http\Request;

class subCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maincat=DB::table('main_waste_category')->select('main_category')->distinct()->get();
 
        return view('admin.addCategory',compact('maincat'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
       
        
        $main_cat_id = DB::table('main_waste_category')->select('id')->where('main_category',$request->input('category'))->get();
    //    var_dump($main_cat_id);

        $sub = new sub_waste_category();
    
        $sub->category = $request->input('subcategory');
        $sub->description = $request->input('description');
        foreach($main_cat_id as $cat)
{
  $cat_id = $cat->id;
}
        $sub->main_category_id = $cat_id;
      
        $sub->save();
        return redirect()->back()->with('success','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


