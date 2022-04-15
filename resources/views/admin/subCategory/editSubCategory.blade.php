@extends('layouts.backend.master')

@section('content')
    <!--start page wrapper -->
    <div class="aiz-main-wrapper">
        <div class="aiz-content-wrapper">
            <div class="aiz-main-content">
                <div class="px-15px px-lg-25px">
                    <div class="row">
                        <div class="col-lg-10 offset-1">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">Update Sub-Category </h5>
                                    <div class="float-right">
                                        <a href="{{route('admin.sub-category.index')}}" class="btn btn-primary">
                                            <i class="las la-list"></i>
                                            <span>Sub-Category List</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('admin.sub-category.update',$subCategory->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label  class="form-label"> Category Type </label>
                                            <select  class="form-select" name="category">
                                                <option value="{{$subCategory->category->id}}" selected>{{$subCategory->category->category}}</option>
                                            @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label  class="form-label"> Sub-Category Name </label>
                                            <input type="text" class="form-control"  name="subcategory" value="{{$subCategory->subcategory}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white text-center py-3 px-15px px-lg-25px">
                    <p class="mb-0">2020 &copy; Active It Zone</p>
                </div>
            </div><!-- .aiz-main-content -->

        </div><!-- .aiz-content-wrapper -->

    </div><!-- .aiz-main-wrapper -->
    <!--end page wrapper -->
@endsection

