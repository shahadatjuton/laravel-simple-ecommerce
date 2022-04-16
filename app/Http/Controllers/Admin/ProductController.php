<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryType;
use App\Models\Product;
use App\Models\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.productList',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $categoryTypes = CategoryType::all();
        $subCategories = SubCategory::all();
        return view('admin.product.createProduct',compact('categoryTypes','categories','subCategories'));
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
            'subcategory'=>'required',
            'name'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'brand'=>'required',
            'description'=>'required',
            'product_image'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',
        ]);

        $image = $request->file('product_image');
        $slug = Str::slug($request->name);
        if (isset($image)){
            $current_date = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            directory check and create
            if (!Storage::disk('public')->exists('product')){
                Storage::disk('public')->makeDirectory('product');
            }
//            image resize and store
            $product_image = Image::make($image)->resize(420,380)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('product/'.$image_name,$product_image);
        }
        $product = new Product();
        $product->subcategory_id = $request->subcategory;
        $product->product_name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->product_image = $image_name;
        $product->save();
        Toastr::success('Product Created Successfully','Success!');
        return redirect()->route('admin.product.index');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $categoryTypes = CategoryType::all();
        $subCategories = SubCategory::all();
        return view('admin.product.editProduct',compact('product','categories','categoryTypes','subCategories'));
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
            'subcategory'=>'required',
            'name'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'brand'=>'required',
            'description'=>'required',
            'product_image'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',
        ]);
        $product = Product::findOrFail($id);
        $image = $request->file('product_image');
        $slug = Str::slug($request->name);
        if (isset($image)){
            $current_date = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            directory check and create
            if (!Storage::disk('public')->exists('product')){
                Storage::disk('public')->makeDirectory('product');
            }
            //            Existing image delete
            if (Storage::disk('public')->exists('product/'.$product->product_image)){
                Storage::disk('public')->delete('product/'.$product->product_image);
            }
//            image resize and store
            $product_image = Image::make($image)->resize(420,380)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('product/'.$image_name,$product_image);
        }
        $product->subcategory_id = $request->subcategory;
        $product->product_name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->product_image = $image_name;
        $product->save();
        Toastr::success('Product Updated Successfully','Success!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Toastr::success('The Product  is deleted successfully','success');
        return  redirect()->back();
    }
}
