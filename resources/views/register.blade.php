@extends('layouts.frontend.master')


@section('content')

    <div class="row mt-4">
        <div class="col-sm-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Registration Form</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label  class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
