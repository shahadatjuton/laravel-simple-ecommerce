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
                                    <h5 class="mb-0 h6">Create Sub-Category</h5>
                                    <div class="float-right">
                                        <a href="{{route('admin.sub-category.index')}}" class="btn btn-primary">
                                            <i class="las la-list"></i>
                                            <span>Sub-Category List</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="row" action="{{route('admin.sub-category.store')}}" method="post">
                                        @csrf
                                        <div class="col-md-12">
                                            <label  class="form-label"> Sub-Category </label>
                                            <select  class="form-select" name="category">
                                            @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <label  class="form-label"> Sub-Category Name </label>
                                            <input type="text" class="form-control"  name="subcategory">
                                        </div>
                                        <div class="col-md-12 mt-4">
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
