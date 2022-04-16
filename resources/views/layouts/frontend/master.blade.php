<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">

{{--Header Start--}}

@include('layouts.frontend.partial.header')

{{--Header End--}}

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
{{--Paypal--}}
<script src="https://www.paypal.com/sdk/js?client-id=AQnz36kfGdLgATV1gazBDHrlwCyIz8T_bQokuS8uWvaf1ED-sPlJdoUpHlSealbIP4FyFjed9B1tz_DT&currency=USD"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>
<script>
    paypal.Buttons({
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{50}}'// Can also reference a variable or function
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                alert(`Transaction ${transaction.status}!! \n\n Your Transection Id: ${transaction.id}
                \n\n !!Thank you for your payment!!`);
            });

        }

    }).render('#paypal-button-container');

</script>

</body>
</html>
