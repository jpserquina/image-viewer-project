<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body>
    <header>
        @include('partials.nav')
    </header>
    <main role="main">
        @include('partials.header')
        @yield('content')
    </main>
        @include('partials.footer')
        @include('partials.footer-scripts')
    </body>
</html>
