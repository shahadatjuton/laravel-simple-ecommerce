@extends('layouts.frontend.master')


@section('content')

    <div class="row mt-4">
        <div class="col-sm-8 offset-2">
            <div class="row credentials">
               <div class="col-md-6">
                   <h4>Credential of Admin</h4>
                   <ul >
                       <li>email: admin@gmail.com</li>
                       <li>password: admin123</li>
                   </ul>
               </div>
                <div class="col-md-6">
                    <h4>Credential of Customer</h4>
                    <ul class="float-right">
                        <li>email: customer@gmail.com</li>
                        <li>password: customer123</li>
                    </ul>
                </div>
                <hr>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Login Form</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
