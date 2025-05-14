@extends('layouts.app')

@section('title', 'Menu')

@section('header')
    <h2 class="font-semibold text-xl text-white leading-tight">
        Menu
    </h2>
@endsection

@section('content')
    <header class="flex justify-between items-center p-5 bg-opacity-80 bg-black">
        <div class="logo">
            <h1 class="text-5xl font-sans">DIVINE <span class="text-red-600">BLISS</span></h1>
            <p class="text-gray-400 italic">Divinity at its finest</p>
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

    <section class="p-10">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-4xl">Menu</h2>
            @auth
                <a href="{{ route('cart') }}" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">Cart</a>
            @endauth
        </div>

        <div class="grid grid-cols-2 gap-8 mb-10">
            @foreach($foodItems as $item)
    <div class="border p-4 rounded-lg bg-white shadow-md">
        <h3 class="text-xl font-bold text-black">{{ $item->name }}</h3>
        <p class="text-gray-600">Rs. {{ $item->price }}/=</p>
        <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}" class="w-full h-32 object-cover rounded mb-4">

        

        <form action="{{ route('cart.add', $item->id) }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">Add to Cart</button>
        </form>
    </div>
@endforeach

        </div>


        <div class="mt-10">
            {{ $foodItems->links() }}
        </div>
    </section>
@endsection

@section('footer')
    <footer class="bg-opacity-80 bg-black p-5 text-center">
        <p class="text-xl">Contact us</p>
        <address class="text-gray-400">
            Divine Bliss (pvt) Ltd,<br>
            101, Negombo Rd, Wattala, Sri Lanka<br>
            divinebliss@gmail.com<br>
            011-6969696 / 011-6669696
        </address>
        <div class="mt-2">
            <p>Instagram: <a href="#" class="text-red-600">@DivineBliss_SL</a></p>
        </div>
    </footer>
@endsection
