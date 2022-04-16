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
                                    <h5 class="mb-0 h6">Category Type List</h5>
                                    <div class="float-right">
                                        <a href="{{route('admin.category-type.create')}}" class="btn btn-primary">
                                            <i class="las la-plus"></i>
                                            <span>Create A Category Type</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Category Type</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($categoryTypes as $key=>$categoryType)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$categoryType->category_type}}</td>
                                            <td>{{$categoryType->created_at->diffForHumans()}}</td>
                                            <td>{{$categoryType->updated_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('admin.category-type.edit',$categoryType->id)}}" class="btn btn-primary"><i class="las la-edit"></i></a>
                                                <button class="btn btn-danger" onclick="deleteCategoryType({{$categoryType->id}})">
                                                    <i class="las la-trash"></i>
                                                </button>
                                                <form id="category-type-delete-{{$categoryType->id}}" action="{{route('admin.category-type.destroy',$categoryType->id)}}" method="post" style="display: none">
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
        function deleteCategoryType(id){
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
                    document.getElementById('category-type-delete-'+id).submit();
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
