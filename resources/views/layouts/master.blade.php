<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{--cropper--}}
    <script src="{{ asset('js/cropper.js') }}"></script><!-- jQuery is required -->
    <link href="{{ asset('css/cropper.css') }}" rel="stylesheet">
    {{--cropper--}}
    {{--    <script src="{{asset('js/jquery.js')}}"></script>--}}
    <title>Laravel</title>
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/axios/dist/axios.min.js')}}"></script>
    {{--    C:\Users\ertebatat sahar\Desktop\laravel\renderforest\node_modules\cropperjs--}}
</head>
<body>


@yield('content')


<script>
    console.log(document.querySelector("meta[name='csrf-token']").getAttribute('content'));
</script>
</body>
</html>

