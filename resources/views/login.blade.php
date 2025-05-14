@extends('layouts.app')

@section('title', 'Login - Divine Bliss')

@section('content')
    <section class="login-section text-center mx-auto my-12 p-5 w-3/5">
        <h2 class="text-4xl mb-5">Login</h2>


        <form action="{{ route('login.process') }}" method="POST" class="text-left">
            @csrf


            <div class="mb-3">
                <label for="username" class="text-lg mb-1">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required class="w-full p-3 mb-3 rounded bg-white bg-opacity-20 text-white">
                @error('username')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="password" class="text-lg mb-1">Password</label>
                <input type="password" id="password" name="password" required class="w-full p-3 mb-3 rounded bg-white bg-opacity-20 text-white">
                @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <button type="submit" class="py-2 px-4 text-lg bg-red-600 text-white rounded mt-4">Login</button>


            <div class="mt-4">
                <a href="{{ route('register') }}" class="py-2 px-4 text-lg border border-red-600 text-red-600 rounded hover:bg-red-600 hover:text-white">Register</a>
            </div>
        </form>
    </section>
@endsection

@section('footer')
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
@endsection
