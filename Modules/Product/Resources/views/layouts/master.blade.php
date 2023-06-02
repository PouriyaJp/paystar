<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Cart</title>

        @include('product::layouts.head-tag')

       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-cart', 'Resources/assets/sass/app.scss') }} --}}

    </head>
    <body>
        @yield('content')

        {{-- Laravel Vite - JS File --}}
{{--         {{ module_vite('build-cart', 'Resources/assets/js/app.js') }}--}}
        @include('product::layouts.script')
        @yield('script')
    </body>
</html>
