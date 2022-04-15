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
                                    <h5 class="mb-0 h6">Create Product </h5>
                                    <div class="float-right">
                                        <a href="{{route('admin.product.index')}}" class="btn btn-primary">
                                            <i class="las la-list"></i>
                                            <span>Product List</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="row" action="{{route('admin.product.store')}}" method="post">
                                        @csrf

                                        <div class=" col-md-4 mb-3">
                                            <label  class="form-label"> Category Type </label>
                                            <select  class="form-select" name="category_type">
                                                @foreach($categoryTypes as $categoryType)
                                                    <option value="{{$categoryType->id}}">{{$categoryType->category_type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label  class="form-label"> Categories </label>
                                            <select  class="form-select" name="category">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label  class="form-label"> Sub-Categories </label>
                                            <select  class="form-select" name="subcategory">
                                                @foreach($subCategories as $subCategory)
                                                    <option value="{{$subCategory->id}}">{{$subCategory->subcategory}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label  class="form-label"> Product Name </label>
                                            <input type="text" class="form-control"  name="name">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label  class="form-label"> Quantity </label>
                                            <input type="number" class="form-control"  name="quantity">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label  class="form-label"> Price </label>
                                            <input type="number" class="form-control"  name="price">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label  class="form-label"> Brand Name </label>
                                            <input type="text" class="form-control"  name="brand">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <label  class="form-label"> Description </label>
                                            <textarea class="form-control"  rows="3" name="description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label  class="form-label">Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
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

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function deleteCategory(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    document.getElementById('category-delete-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
