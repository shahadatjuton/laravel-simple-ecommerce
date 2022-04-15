<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryTypes = CategoryType::all();
        return view('admin.categoryType.categoryTypeList',compact('categoryTypes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryType.createCategoryType');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'category_type'=>'required|unique:category_types'
        ]);
        $category_type = new CategoryType();
        $category_type->category_type = $request->category_type;
        $category_type->slug = Str::slug($request->category_type);
        $category_type->save();
        Toastr::success('CategoryType  Type Created successfully', 'Success!!');
        return redirect()->route('admin.category-type.index');

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
        $categoryType = CategoryType::findOrFail($id);
        return view('admin.categoryType.editCategoryType',compact('categoryType'));
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
        $category_type = CategoryType::findOrFail($id);

        $this->validate($request,[
            'category_type'=>'required|unique:category_types'
        ]);

        $category_type->category_type = $request->category_type;
        $category_type->slug = Str::slug($request->category_type);
        $category_type->save();
        Toastr::success('CategoryType  Type Updated successfully', 'Success!!');
        return redirect()->route('admin.category-type.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_type = CategoryType::findOrFail($id);
        $category_type->delete();
        Toastr::success('The category type is deleted successfully','success');
        return  redirect()->back();
    }
}
