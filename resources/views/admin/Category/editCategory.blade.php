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
                                    <h5 class="mb-0 h6">Update Category Type</h5>
                                    <div class="float-right">
                                        <a href="{{route('admin.category-type.index')}}" class="btn btn-primary">
                                            <i class="las la-list"></i>
                                            <span>Category Type List</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('admin.category.update',$category->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label  class="form-label"> Category Type </label>
                                            <select  class="form-select" name="category_type">
                                                <option value="{{$category->categoryType->id}}" selected>{{$category->categoryType->category_type}}</option>
                                            @foreach($categoryTypes as $categoryType)
                                                    <option value="{{$categoryType->id}}">{{$categoryType->category_type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label  class="form-label"> Category Name </label>
                                            <input type="text" class="form-control"  name="category" value="{{$category->category}}">
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

