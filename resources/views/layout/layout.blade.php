<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MaiBoutique | {{ $page_title }}</title>

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link srel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">

        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    </head>
    <body>
        @if($navbarFlag === true)
            @include("partials.navbar")
        @endif

        @yield("content")
    </body>
</html>
