@extends('layouts.app')

@section('title', 'Contact - Divine Bliss')

@section('header')
    <h2 class="font-semibold text-xl text-white leading-tight">
        Contact Us
    </h2>
@endsection

@section('content')
    <header class="flex justify-between items-center p-5 bg-black bg-opacity-80">
        <div class="logo">
            <h1 class="text-5xl">DIVINE <span class="text-red-600">BLISS</span></h1>
            <p class="text-lg italic text-gray-300">Divinity at its finest</p>
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

    <section class="contact-section p-10 text-center">
        <h2 class="text-4xl mb-5">Contact Us</h2>

        <form action="{{ route('contact.submit') }}" method="POST" class="bg-gray-800 p-5 rounded-lg">
            @csrf
            <label for="name" class="text-lg mb-2">Name:</label>
            <input type="text" id="name" name="name" required class="w-full p-2 mb-4 bg-gray-700 text-white rounded" value="{{ old('name') }}">
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        
            <label for="email" class="text-lg mb-2">Email:</label>
            <input type="email" id="email" name="email" required class="w-full p-2 mb-4 bg-gray-700 text-white rounded" value="{{ old('email') }}">
            @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        
            <label for="message" class="text-lg mb-2">Your Message:</label>
            <textarea id="message" name="message" required class="w-full p-2 mb-4 bg-gray-700 text-white rounded">{{ old('message') }}</textarea>
            @error('message') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        
            <button type="submit" class="bg-red-600 py-2 px-4 rounded">Submit</button>
        </form>

        @if(session('success'))
            <p class="text-green-500 mt-5">{{ session('success') }}</p>
        @endif
    </section>
@endsection

@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('div.min-h-screen').classList.remove('bg-gray-100');
        });
    </script>
@endpush

@section('footer')
    <footer class="bg-opacity-80 bg-black p-5 text-center">
        <p> 2025 Divine Bliss. All rights reserved.</p>
        <div class="social-links mt-2">
            <p>Follow us on:</p>
            <p>Facebook: <a href="#" class="text-red-600">Divine Bliss</a></p>
            <p>Instagram: <a href="#" class="text-red-600">@DivineBliss_SL</a></p>
        </div>
    </footer>
@endsection
