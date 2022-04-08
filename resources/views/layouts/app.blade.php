<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-amber-200">
        <nav class="fixed bg-amber-50 shadow-md z-50 w-full px-5 py-2 flex justify-between items-center">
            <ul class="flex items-center">
                <li>
                    <x-application-logo class="h-14 w-14"/>
                </li>
                <li>
                    <a href="/" class="p-6" >Home</a>
                </li>
                <li>
                    <a href="{{ route('posts')}}" class="p-6 " >Posts</a>
                </li>
            </ul>

            @if (Route::has('login'))
                <div class="p-6 flex justify-between">
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                    @else
                        <a href="{{ route('login') }}" class="px-4">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>
        @yield('content')
    </body>
</html>
