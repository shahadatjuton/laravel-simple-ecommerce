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
                                    <h5 class="mb-0 h6">Create Category Type</h5>
                                    <div class="float-right">
                                        <a href="{{route('admin.category-type.index')}}" class="btn btn-primary">
                                            <i class="las la-list"></i>
                                            <span>Category Type List</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('admin.category-type.update',$categoryType->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label  class="form-label">Category Type</label>
                                            <input type="text" class="form-control"  name="category_type" value="{{$categoryType->category_type}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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

