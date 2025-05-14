@extends('layouts.app')

@section('title', 'About Us - Divine Bliss')

@section('header')
    <h2 class="font-semibold text-xl text-white leading-tight">
        About Us
    </h2>
@endsection

@section('content')
    <header class="flex justify-between items-center p-5 bg-black bg-opacity-80">
        <div class="logo">
            <h1 class="text-5xl font-sans">DIVINE <span class="text-red-600">BLISS</span></h1>
            <p class="text-lg italic text-gray-300">Divinity at its finest</p>
        </div>
        <!-- Navbar -->
<nav class="flex items-center space-x-6">
    <ul class="flex space-x-6">
        <li><a href="{{ route('home') }}" class="text-xl hover:text-red-600">Home</a></li>
        <li><a href="{{ route('about') }}" class="text-xl hover:text-red-600">About</a></li>
        <li><a href="{{ route('menu') }}" class="text-xl hover:text-red-600">Menu</a></li>
        <li><a href="{{ route('contact') }}" class="text-xl hover:text-red-600">Contact</a></li>
    </ul>
    @auth
        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="border border-white text-white py-1 px-2 rounded ml-5 hover:bg-red-600">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="border border-white text-white py-1 px-2 rounded ml-5 hover:bg-red-600">Login</a>
    @endauth
</nav>

    </header>

    <section class="bg-cover bg-center h-96 flex items-center justify-center" style="background-image: url('{{ asset('aboutback.jpg') }}');">
        <h2 class="text-4xl bg-black bg-opacity-50 p-4">Our Journey</h2>
    </section>

    <section class="p-10 text-center">
        <h3 class="text-2xl mb-5 text-white">
            At Divine Bliss, we believe that every meal should be a heavenly experience. Our journey began with a simple yet profound mission: to bring the celestial flavors of gourmet cuisine to your table. Inspired by the divine, we meticulously craft each dish to not only satisfy your hunger but also to elevate your senses. From sourcing the freshest ingredients to employing the finest culinary techniques, every step we take is a testament to our commitment to excellence. Our passion for food transcends the ordinary, transforming every bite into a blissful moment. Join us on this divine journey and indulge in the exquisite flavors that make every meal at Divine Bliss a celebration of taste and elegance.
        </h3>

        <div class="overflow-hidden rounded-lg">
            <img src="{{ asset('aboutmid.jpg') }}" alt="Coffee Essentials" class="w-full h-auto object-cover mb-5">
            <h3 class="text-2xl mb-5 text-white">
                At Divine Bliss, we go beyond delightful dining to create an experience that is truly divine. Our culinary philosophy emphasizes high-quality ingredients and exceptional flavours, ensuring every dish and beverage we offer is a taste of heaven. Whether you’re indulging in our gourmet meals or refreshing drinks, we aim to elevate your dining experience to celestial heights. We also offer convenient delivery to your doorstep, so you can enjoy the heavenly flavours of Divine Bliss in the comfort of your home. Join us in savouring food and beverages that bring a touch of bliss to your day.
            </h3>
        </div>
    </section>

    <footer class="bg-black bg-opacity-80 p-5 text-center">
        <p class="text-xl text-white">Contact us</p>
        <address class="text-lg text-gray-300">
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

@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('div.min-h-screen').classList.remove('bg-gray-100');
            document.querySelector('div.min-h-screen').classList.add('bg-gray-900');
        });
    </script>
@endpush
