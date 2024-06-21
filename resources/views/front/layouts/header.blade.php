<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="assets/js/scrollreveal.min.js" defer></script>
    <script defer src="{{ asset('main.js') }}"></script>
    @vite('resources/css/app.css')
    <title>Advance Fit</title>
</head>

<body>
    {{-- <header class="header" id="header"> --}}
    {{-- <nav class="nav p-5 flex flex-wrap justify-between items-center md:flex-row">
            <a href="{{ url('/') }}" class="nav__logo">
                ADVANCE FIT
            </a>

            <ul class="gap-6 theme-pages flex flex-col md:flex-row md:mt-0">
                <li><a href="{{ url('/') }}" class="block md:inline-block">Home</a></li>
                <li><a href="{{ url('/subscriptions') }}" class="block md:inline-block">Subscriptions</a></li>
                <li><a href="{{ url('/exercises') }}" class="block md:inline-block">Exercises</a></li>
                <li><a href="{{ url('/contact') }}" class="block md:inline-block">Contact</a></li>
                <li><a href="{{ url('/about') }}" class="block md:inline-block">Over Ons</a></li>
            </ul>

            <div class="nav__btns inline-flex gap-3">
                <!-- Theme change button -->
                <a href="{{ route('login') }}"><i class="ri-user-line"></i></a>
            </div>
        </nav> --}}


    <nav class="relative px-4 py-4 flex justify-between items-center bg-white">
        <a class="text-3xl font-bold leading-none text-[#221551]" href="{{ url('/') }}">ADVANCE FIT
        </a>
        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-[#221551] p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
        <ul
            class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:items-center lg:w-auto lg:space-x-6">
            <li><a class="text-sm font-semibold text-black hover:text-gray-500" href="{{ url('/') }}">Home</a></li>

            <li><a class="text-sm font-semibold text-black hover:text-gray-500"
                    href="{{ route('user.subscription.index') }}">Subscriptions</a></li>

            <li><a class="text-sm font-semibold text-black hover:text-gray-500"
                    href="{{ url('/exercises') }}">Exercises</a></li>

            <li><a class="text-sm font-semibold text-black hover:text-gray-500" href="{{ url('/contact') }}">Contact</a>
            </li>

            <li><a class="text-sm font-semibold text-black hover:text-gray-500" href="{{ url('/about') }}">About</a>
            </li>
        </ul>
        <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200"
            href="{{ route('login') }}">Sign In</a>
        <a class="hidden lg:inline-block py-2 px-6 bg-[#221551] text-sm text-white font-bold rounded-xl transition duration-200"
            href="{{ route('register') }}">Sign up</a>
    </nav>
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none " href="{{ url('/') }}">
                    ADVANCE FIT
                </a>
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 rounded"
                            href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 rounded"
                            href="{{ url('/subscriptions') }}">Subscriptions Us</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 rounded"
                            href="{{ url('/exercises') }}">Exercises</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 rounded"
                            href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 rounded"
                            href="{{ url('/about') }}">About</a>
                    </li>
                </ul>
            </div>
            <div class="mt-auto">
                <div class="pt-6">
                    <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semiboldbg-gray-50 hover:bg-gray-100 rounded-xl"
                        href="{{ route('login') }}">Sign in</a>
                    <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-[#221551]  rounded-xl"
                        href="{{ route('register') }}">Sign Up</a>
                </div>
                <p class="my-4 text-xs text-center text-gray-400">
                    <span>Copyright © 2021</span>
                </p>
            </div>
        </nav>
    </div>
</body>

<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
</script>
