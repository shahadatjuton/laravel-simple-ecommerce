@extends('layouts.backend.master')

@section('content')
    <div class="aiz-main-wrapper">


        <div class="aiz-content-wrapper">


            <div class="aiz-main-content">
                <div class="px-15px px-lg-25px">

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">Product List</h5>
                                    <div class="float-right">
                                        <a href="{{route('admin.product.create')}}" class="btn btn-primary">
                                            <i class="las la-plus"></i>
                                            <span>Create A New Product </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Sub-Category</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($products as $key=>$product)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>
                                                <img src="{{asset('storage/product/'.$product->product_image)}}" height="80" width="60">
                                            </td>
                                            <td>{{$product->subcategory->category->category}}</td>
                                            <td>{{$product->subcategory->subcategory}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->created_at->diffForHumans()}}</td>
                                            <td>{{$product->updated_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-primary"><i class="las la-edit"></i></a>
                                                <button class="btn btn-danger" onclick="deleteProduct({{$product->id}})">
                                                    <i class="las la-trash"></i>
                                                </button>
                                                <form id="product-delete-{{$product->id}}" action="{{route('admin.product.destroy',$product->id)}}" method="post" style="display: none">
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
        function deleteProduct(id){
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
                    document.getElementById('product-delete-'+id).submit();
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
