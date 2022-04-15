<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryType;
use App\Models\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();
        return view('admin.subCategory.subCategoryList',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryTypes = CategoryType::all();
        $categories = Category::all();
        return view('admin.subCategory.createSubCategory',compact('categoryTypes','categories'));
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
            'subcategory'=>'required|unique:sub_categories'
        ]);
        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->subcategory = $request->subcategory;
        $subCategory->slug = Str::slug($request->subcategory);
        $subCategory->save();
        Toastr::success('Sub-Category is Created successfully', 'Success!!');
        return redirect()->route('admin.sub-category.index');
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
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subCategory.editSubCategory',compact('subCategory','categories'));
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
        $this->validate($request,[
            'subcategory'=>'required|unique:sub_categories'
        ]);
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->category_id = $request->category;
        $subCategory->subcategory = $request->subcategory;
        $subCategory->slug = Str::slug($request->subcategory);
        $subCategory->save();
        Toastr::success('Sub-Category is Updated successfully', 'Success!!');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        Toastr::success('The Sub-Category  is deleted successfully','success');
        return  redirect()->back();
    }
}
