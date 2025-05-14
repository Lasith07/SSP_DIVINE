@extends('layouts.app')

@section('title', 'Register - Divine Bliss')

@section('content')
    @if (Auth::check())
        <script>window.location = "{{ route('home') }}";</script>
    @else
        <section class="register-section text-center mx-auto my-12 p-5 w-3/5">
            <h2 class="text-4xl mb-5">Register</h2>

            <form action="{{ route('register.process') }}" method="POST" class="text-left">
                @csrf
                <div class="mb-3">
                    <label for="username" class="text-lg mb-1">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required class="w-full p-3 mb-3 rounded bg-white bg-opacity-20 text-white">
                    @error('username')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
                </div>

                <div class="name-inputs flex justify-between mb-4">
                    <div class="w-1/2 mr-2">
                        <label for="first-name" class="text-lg mb-1">First Name</label>
                        <input type="text" id="first-name" name="first_name" value="{{ old('first_name') }}" required class="w-full p-3 mb-3 rounded bg-white bg-opacity-20 text-white">
                        @error('first_name')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="last-name" class="text-lg mb-1">Last Name</label>
                        <input type="text" id="last-name" name="last_name" value="{{ old('last_name') }}" required class="w-full p-3 mb-3 rounded bg-white bg-opacity-20 text-white">
                        @error('last_name')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="text-lg mb-1">Password</label>
                    <input type="password" id="password" name="password" required class="w-full p-3 mb-3 rounded bg-white bg-opacity-20 text-white">
                    @error('password')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="text-lg mb-1">E-mail Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full p-3 mb-3 rounded bg-white bg-opacity-20 text-white">
                    @error('email')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="text-lg mb-1">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required class="w-full p-3 mb-3 rounded bg-white bg-opacity-20 text-white">
                    @error('phone')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
                </div>

                <div class="extra-info text-right mb-4">
                    <a href="{{ route('login') }}" class="text-white text-sm hover:text-red-600">Already have an account?</a>
                </div>

                <div class="mb-4">
                    <label class="text-lg mb-1">Payment Method</label>
                    <div class="flex items-center mb-3">
                        <input type="radio" id="cash" name="payment_method" value="cash" class="mr-2">
                        <label for="cash" class="text-lg">Cash on Delivery</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input type="radio" id="card" name="payment_method" value="card" class="mr-2">
                        <label for="card" class="text-lg">Card on Delivery</label>
                    </div>
                </div>

                <button type="submit" class="py-2 px-4 text-lg bg-red-600 text-white rounded mt-4">Register</button>
            </form>
        </section>
    @endif
@endsection

@section('footer')
    <footer class="bg-black bg-opacity-80 p-5 text-center">
        <div class="footer-contact">
            <p>Contact us</p>
            <address class="text-gray-300">
                Divine Bliss (pvt) Ltd,<br>
                101, Negombo Rd, Wattala, Sri Lanka<br>
                divinebliss@gmail.com<br>
                011-6969696 / 011-6669990
            </address>
            <div class="social mt-2">
                <p>Instagram: <a href="#" class="text-red-600">@DivineBliss_SL</a></p>
            </div>
        </div>
    </footer>
@endsection
