<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body class="bg-slate-100">
    <div class="flex relative">
        <div
            class="bg-white h-screen w-1/6 border-r border-slate-200 flex flex-col p-4 justify-start items-start fixed left-0 top-0">
            <div class="flex flex-col w-full gap-4">

                <div class="h-auto w-auto flex items-center gap-1 border-b border-white py-2 mb-4">
                    <span class="material-symbols-outlined text-[2.5rem] text-blue-600">
                        bento
                    </span>
                    <span class="font-sans text-2xl font-bold text-blue-600"> MyCanteen </span>
                </div>
                <div class="flex flex-col gap-3">
                    {{-- h-auto w-full flex items-center gap-1 p-2 bg-white rounded-lg text-2xl text-blue-600 --}}
                    <a {{-- href="{{ route('') }}" --}}
                        class="@if (request()->routeIs('')) h-auto w-full flex items-center gap-1 p-2 bg-white rounded-lg text-2xl text-blue-600  @else matik @endif">
                        <span class="material-symbols-outlined ">
                            Dashboard
                        </span>
                        <span class="font-sans text-md text-blue-600 font-semibold"> Dashboard </span>
                    </a>
                    <button
                        class="h-auto w-full flex items-center gap-2 p-2 px-4 bg-blue-600 rounded-lg font-sans text-lg text-white  font-medium">
                        <span class="material-symbols-outlined text-2xl ">
                            fastfood
                        </span>
                        <span class=""> Product </span>
                    </button>
                    <button
                        class="text-lg font-semibold h-auto w-full flex items-center gap-1 p-2  rounded-lg text-blue-600">
                        <span class="material-symbols-outlined text-2xl">
                            history
                        </span>
                        <span class="font-sans "> Transaction </span>
                    </button>
                </div>

            </div>
        </div>
        <div class="flex flex-col w-5/6 ml-[16.66667%] relative">
            <div class="flex bg-white  border-b border-slate-200 px-12 py-2 items-center justify-end fixed z-50 w-5/6 ">


                @guest
                    <div class="flex flex-row gap-2">

                        @if (Route::has('login'))
                            <div class="p-2 px-4 border-2 border-blue-600 rounded-md flex item-center">
                                <a class="text-blue-600 font-semibold" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </div>
                        @endif

                        @if (Route::has('register'))
                            <div class="p-2 px-4 border  bg-blue-600 rounded-md flex item-center">

                                <a class=" text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="h-auto flex items-center gap-2 ">
                        <span class="material-symbols-outlined">
                            notifications
                        </span>
                        <div class="profile flex items-center gap-2  rounded-full bg-slate-100 p-2 ">


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            <a id="" class="text-md" href="{{ route('profile') }}" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm3RFDZM21teuCMFYx_AROjt-AzUwDBROFww&usqp=CAU"
                                alt="" srcset="" class="h-8 rounded-full border-2 border-blue-600">
                            <span class="material-symbols-outlined">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </span>
                        </div>
                    @endguest
                </div>
            </div>

            <main class=" w-full h-full px-6 py-20 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
