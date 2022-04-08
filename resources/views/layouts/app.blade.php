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
    <body class="font-sans antialiased bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
                <li>
                    <a href="/" class="p-6" >Home</a>
                </li>
                <li>
                    <a href="{{ route('posts')}}" class="p-6 " >Post</a>
                </li>
                @if (Route::has('login'))
                <li>
                    @auth
                    <a href="{{ url('/dashboard') }}" class="p-6 ">Dashboard</a>
                    @endauth
                </li>
                @endif
            </ul>

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-6 sm:block">
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
