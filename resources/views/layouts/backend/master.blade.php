<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'The Talent HUb') }}</title>
    <!-- Favicon -->
    <link name="favicon" type="image/x-icon" href="{{asset('assets/backend/img/favicon.png')}}" rel="shortcut icon" />

    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!-- vendors css -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/vendors.css')}}">

    <!-- aiz core css -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/aiz-core.css')}}">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
                    {{--    Toastr--}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    <script>
        var AIZ = AIZ || {};
    </script>


</head>
<body>

@include('layouts.backend.partial.sidebar')

<!--start header -->
@include('layouts.backend.partial.topbar')
<!--end header -->


@yield('content')




<script src="{{asset('assets/backend/js/vendors.js')}}" ></script>
<script src="{{asset('assets/backend/js/aiz-core.js')}}" ></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
                {{--Toastr--}}
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
@stack('js')
</body>
</html>
