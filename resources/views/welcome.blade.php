@extends('layouts.frontend.master')


@section('content')

    <div class="paypal-payment text-center mt-4">
        <div class="row">
            <div class="col-sm-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h2>You have to pay $50</h2>
                    </div>
                    <div class="card-body">
                        <div id="paypal-button-container" class="text-center mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
