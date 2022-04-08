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



    <!-- NAVBAR -->
    <nav class=" bg-amber-50 shadow-md z-50 w-full px-5 py-2 flex justify-between items-center">
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
    <!-- CONTENT -->
        <div class="flex flex-col justify-center h-full py-12">
            <div class="self-center items-center flex flex-col sm:flex-row w-full md:w-5/6 xl:w-2/3 px-4 sm:px-0">
                <div class="w-full text-center sm:text-left sm:w-1/2 py-12 sm:px-8">
                    <span class="text-gray-800 font-bold tracking tracking-widest">TALK. BLOG</span></h1>
                    <h1 class="font-bold tracking-widest text-4xl">Talk about anything that you want about code!</h1>
                    <span class="block font-light text-2xl my-6">
                        <ul >
                            <li>Nice Comunity</li>
                            <li>Learn about anny language</li>
                            <li>Help other people</li>
                            <li>Get help for yourself</li>
                            <li>Posts every day</li>
                            <li>Fast responses</li>
                            <li>Chat at live time!</li>
                        </ul>
                    </span>
                    <p class="font-bold tracking-widest text-4xl">...think about it!</p>
                </div>
                <div class="w-full sm:w-1/2">
                    <x-header-image class="w-full h-full"></x-header-image>
                </div>
            </div>
        </div>
    </body>
</html>
