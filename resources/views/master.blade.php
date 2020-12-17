<?php
//sfrutto il blade per acquisire i valori di title e content con yield dalle
//section definite nelle view
//e acquisire le pagine di navbar e footer con include
?>

<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Custom fonts for this template -->
        <link rel="stylesheet" href="{!! asset('/font/fontawesome-free/css/all.min.css') !!}">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/clean-blog.min.css') !!}">
    </head>

    <body>
        @include('shared.navbar')
        @yield('content')
        @include('shared.footer')
    </body>
</html>
