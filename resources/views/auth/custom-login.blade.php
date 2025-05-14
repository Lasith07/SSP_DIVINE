@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Divine Bliss</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white font-arial">
    <header class="flex justify-between items-center p-5 bg-black bg-opacity-80">
        <div class="logo">
            <h1 class="text-5xl text-red-600 font-lucida">DB <span class="text-white text-base">Divinity at its finest</span></h1>
        </div>
        <nav>
            <ul class="flex space-x-5">
                <li><a class="text-xl text-white hover:text-red-600 active:text-red-600" href="{{ route('home') }}">Home</a></li>
                <li><a class="text-xl text-white hover:text-red-600" href="{{ route('about') }}">About</a></li>
                <li><a class="text-xl text-white hover:text-red-600" href="{{ route('menu') }}">Menu</a></li>
                <li><a class="text-xl text-white hover:text-red-600" href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="login-section text-center mx-auto my-12 p-5 w-3/5">
        <h2 class="text-4xl mb-5">Login</h2>
        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <label for="username" class="text-lg mb-1">Username</label>
            <input type="text" id="username" name="username" required class="w-full p-3 mb-3 rounded bg-white bg-opacity-20 text-white">

            <label for="password" class="text-lg mb-1">Password</label>
            <input type="password" id="password" name="password" required class="w-full p-3 mb-3 rounded bg-white bg-opacity-20 text-white">

            <button type="submit" class="py-2 px-4 text-lg bg-red-600 text-white rounded mt-4">Login</button>
            <a href="{{ route('register') }}" class="py-2 px-4 text-lg border border-red-600 text-red-600 rounded hover:bg-red-600 hover:text-white">Register</a>
        </form>
    </section>

    <footer class="bg-black bg-opacity-80 p-5 text-center">
        <div class="footer-contact">
            <p>Contact us</p>
            <address class="text-gray-300">
                Divine Bliss (pvt) Ltd,<br>
                101, Negombo Rd, Wattala, Sri Lanka<br>
                divinebliss@gmail.com<br>
                011-6969696 / 011-6669696
            </address>
            <div class="social mt-2">
                <p>Instagram: <a href="#" class="text-red-600">@DivineBliss_SL</a></p>
            </div>
        </div>
    </footer>
</body>
</html>
