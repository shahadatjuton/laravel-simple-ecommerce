@extends('layouts.frontend.master')


@section('content')

    <div class="paypal-payment text-center mt-4">
        <div class="row">
            <div class="col-sm-8 offset-2">
                <div class="card">
                    <div>
                        <h4>Paypal Integration Using JavaScript SDK</h4>
                    </div>
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

    <div class="paypal-payment text-center mt-4">
        <div class="row">
            <div class="col-sm-8 offset-2">
                <div class="card">
                    <div>
                        <h4>Paypal Integration Using Third Party Package</h4>
                    </div>
                    <div class="card-header">
                        <h2>You have to pay $50</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('charge') }}" method="post">
                            @csrf

                            <input type="text" name="amount" value="50"/>
                            {{ csrf_field() }}
                            <input type="submit" name="submit" value="Pay Now">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
