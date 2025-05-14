@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <section class="p-10">
        <h2 class="text-4xl mb-5">Checkout</h2>
        @livewire('cart-summary')
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
            <div class="bg-blue-200 text-blue-800 p-4 rounded mb-4">
                Order ID: {{ session('order_id') }}
            </div>
        @endif
        
        @if(session('cart') && count(session('cart')) > 0)
            <div>
                @foreach(session('cart') as $id => $details)
                    <div class="flex justify-between items-center mb-4 border-b pb-4">
                        <div class="flex items-center">
                            <!-- Image URL fallback -->
                            <img src="{{ asset('storage/' . ($details['image_url'] ?? 'default.jpg')) }}" alt="{{ $details['name'] }}" class="w-20 h-20 object-cover rounded mr-4">

                            <div>
                                <h3 class="text-xl">{{ $details['name'] }}</h3>
                                <p>Rs. {{ $details['price'] }}/= x {{ $details['quantity'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            
            </div>

            <div class="mt-5 flex justify-between items-center">
                <div>
                    <strong>Total: </strong>
                    <span class="text-xl text-red-600">Rs. {{ array_sum(array_map(function($item) {
                        return $item['price'] * $item['quantity'];
                    }, session('cart'))) }}/=</span>
                </div>

                <div>
                   
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Checkout</button>
                    </form>
                </div>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif
        @if(auth()->check())
        <div class="mt-4">
            <a href="{{ route('menu') }}" class="bg-gray-700 text-white px-4 py-2 rounded">Back to Menu</a>
        </div>
    @endif
    </section>
@endsection
