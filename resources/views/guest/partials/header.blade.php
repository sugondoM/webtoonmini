<!doctype html>
<html lang="{{ app()->getLocale() }}">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <title> @yield('title') </title>
    <link href="{!! asset('css/main.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('css/theme-monochrome.css') !!}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {!! Html::script('js/jquery-3.3.1.min.js') !!}

</head>
<body>