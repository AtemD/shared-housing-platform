<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.header')
    </head>

    <body>
        <div id="app">
           
            <main class="pb-4">
                @yield('content')
            </main>

            @include('includes.footer')
        </div>
    </body>
</html>
