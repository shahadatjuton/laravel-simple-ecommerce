@extends('layouts.backend.master')

@section('content')
    <div class="aiz-main-wrapper">


        <div class="aiz-content-wrapper">


            <div class="aiz-main-content">
                <div class="px-15px px-lg-25px">

                    <div class="row">
                        <div class="col-lg-10 offset-1">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">Sub-Category List</h5>
                                    <div class="float-right">
                                        <a href="{{route('admin.sub-category.create')}}" class="btn btn-primary">
                                            <i class="las la-plus"></i>
                                            <span>Create A Sub-Category </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Category Type</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Sub-Category</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($subCategories as $key=>$subCategory)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$subCategory->category->categoryType->category_type}}</td>
                                            <td>{{$subCategory->category->category}}</td>
                                            <td>{{$subCategory->subcategory}}</td>
                                            <td>{{$subCategory->created_at->diffForHumans()}}</td>
                                            <td>{{$subCategory->updated_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('admin.sub-category.edit',$subCategory->id)}}" class="btn btn-primary"><i class="las la-edit"></i></a>
                                                <button class="btn btn-danger" onclick="deleteSubCategory({{$subCategory->id}})">
                                                    <i class="las la-trash"></i>
                                                </button>
                                                <form id="sub-category-delete-{{$subCategory->id}}" action="{{route('admin.sub-category.destroy',$subCategory->id)}}" method="post" style="display: none">
                                                    @csrf
                                                    @method('delete')

                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                            <p>Data Not Found</p>
                                        @endforelse
                                        </tbody>
                                    </table>

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
@endsection

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function deleteSubCategory(id){
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
                    document.getElementById('sub-category-delete-'+id).submit();
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
