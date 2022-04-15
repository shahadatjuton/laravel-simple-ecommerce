<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('admin.category.categoryList',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryTypes = CategoryType::all();
        return view('admin.category.createCategory',compact('categoryTypes'));

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
            'category'=>'required|unique:categories'
        ]);
        $category = new Category();
        $category->category_type_id = $request->category_type;
        $category->category = $request->category;
        $category->slug = Str::slug($request->category);
        $category->save();
        Toastr::success('Category is Created successfully', 'Success!!');
        return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);
        $categoryTypes = CategoryType::all();
        return view('admin.category.editCategory',compact('category','categoryTypes'));
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
            'category'=>'required'
        ]);
        $category = Category::findOrFail($id);

        $category->category_type_id = $request->category_type;
        $category->category = $request->category;
        $category->slug = Str::slug($request->category);
        $category->save();
        Toastr::success('Category is Updated successfully', 'Success!!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Toastr::success('The category  is deleted successfully','success');
        return  redirect()->back();
    }
}
