@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<section class="p-10">
    <div class="flex justify-between items-center mb-5">
        <h2 class="text-4xl">Your Cart</h2>

        @auth
            <a href="{{ route('menu') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
                Back to Menu
            </a>
        @endauth
    </div>

    @if(session('cart') && count(session('cart')) > 0)
        <div>
            @foreach(session('cart') as $id => $details)
                <div class="flex justify-between items-center mb-4 border-b pb-4">
                    <div class="flex items-center">
                            
                            <img src="{{ asset('storage/' . ($details['image_url'] ?? 'default.jpg')) }}" alt="{{ $details['name'] }}" class="w-20 h-20 object-cover rounded mr-4">

                            <div>
                                <h3 class="text-xl">{{ $details['name'] }}</h3>
                                <p>Rs. {{ $details['price'] }}/= x {{ $details['quantity'] }}</p>
                            </div>
                        </div>
                        <div>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Remove</button>
                            </form>
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
                    <a href="{{ route('checkout') }}" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Proceed to Checkout</a>
                </div>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif
    </section>
@endsection
