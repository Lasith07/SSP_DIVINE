<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Bliss</title>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body class="bg-gray-900 text-white">


    <header class="flex justify-between items-center p-5 bg-black bg-opacity-80">
        <div class="logo">
            <h1 class="text-5xl">DIVINE <span class="text-red-600">BLISS</span></h1>
            <p class="text-lg italic text-gray-300">Divinity at its finest</p>
            @if (session('username'))
                <div class="text-center mt-2">
                    <span class="text-3xl">Welcome, {{ session('username') }}!</span>
                </div>
            @endif
        </div>


<nav class="flex items-center space-x-6">
    <ul class="flex space-x-6">
        <li><a href="{{ route('home') }}" class="text-xl hover:text-red-600">Home</a></li>
        <li><a href="{{ route('about') }}" class="text-xl hover:text-red-600">About</a></li>
        <li><a href="{{ route('menu') }}" class="text-xl hover:text-red-600">Menu</a></li>
        <li><a href="{{ route('contact') }}" class="text-xl hover:text-red-600">Contact</a></li>
    </ul>
    @auth

        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="border border-white text-white py-1 px-2 rounded ml-5 hover:bg-red-600">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="border border-white text-white py-1 px-2 rounded ml-5 hover:bg-red-600">Login</a>
    @endauth
</nav>

    </header>


    <section class="motto bg-cover bg-center h-96 flex items-center justify-center" style="background-image: url('homeback.jpg');">
        <h2 class="text-4xl bg-black bg-opacity-50 p-4">WHAT HEAVENLY TASTE DO YOU SEEK?</h2>
    </section>


    <section class="popular-choices p-10 text-center">
        <h3 class="text-3xl mb-8">Popular Choices</h3>
        <div class="grid grid-cols-2 gap-5">
            <div class="item rounded overflow-hidden shadow-lg">
                <img src="pic1.jpg" alt="Eve's Apple Pie" class="w-full h-auto object-cover max-h-64">
                <p class="mt-2 text-xl italic">Eve's Apple Pie</p>
            </div>
            <div class="item rounded overflow-hidden shadow-lg">
                <img src="pic2.jpg" alt="Blissed Ambrosia" class="w-full h-auto object-cover max-h-64">
                <p class="mt-2 text-xl italic">Blissed Ambrosia</p>
            </div>
            <div class="item rounded overflow-hidden shadow-lg">
                <img src="pic7.jpg" alt="Paradise Pasta" class="w-full h-auto object-cover max-h-64">
                <p class="mt-2 text-xl italic">Paradise Pasta</p>
            </div>
            <div class="item rounded overflow-hidden shadow-lg">
                <img src="pic4.jpg" alt="Coffee Essentials" class="w-full h-auto object-cover max-h-64">
                <p class="mt-2 text-xl italic">Coffee Essentials</p>
            </div>
        </div>
    </section>


    <footer class="bg-black bg-opacity-80 p-5 text-center">
        <div class="contact">
            <p class="text-xl mb-2">Contact us</p>
            <address class="text-lg text-gray-300">
                Divine Bliss (pvt) Ltd,<br>
                101, Negombo Rd, Wattala, Sri Lanka<br>
                divinebliss@gmail.com<br>
                011-6969696 / 011-6669696
            </address>
            <div class="social">
                <p>Instagram: <a href="#" class="text-red-600">@DivineBliss_SL</a></p>
            </div>
        </div>
    </footer>

</body>
</html>
