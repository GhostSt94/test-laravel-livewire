{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/7d7edc8fb9.js" crossorigin="anonymous"></script>
        @livewireStyles
    </head>
    <body>
        @yield('body') --}}
        @extends('master.layouts')
        @section('body')
            @extends('master.navbar')
            <livewire:contacts/>
        @endsection
        
        {{-- @livewireScripts
    </body>
</html> --}}
