@extends('layouts.app')

@section('title', $foodItem->name . ' - Divine Bliss Menu')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $foodItem->name }}
    </h2>
@endsection

@section('content')
    <section class="container mx-auto px-4 py-8">
        <div class="grid md:grid-cols-2 gap-8">
            <div class="menu-item-image">
                <img src="{{ asset('storage/' . $foodItem->image_url) }}" alt="{{ $foodItem->name }}" class="w-full h-auto rounded-lg shadow-lg object-cover">
            </div>
            
            <div class="menu-item-details">
                <h1 class="text-4xl font-bold mb-4">{{ $foodItem->name }}</h1>
                
                <p class="text-gray-700 text-lg mb-6">{{ $foodItem->description }}</p>
                
                <div class="price-section">
                    <span class="text-3xl font-semibold text-red-600">Rs. {{ number_format($foodItem->price, 2) }}/=</span>
                </div>
                
                @auth
                    <div class="mt-6">
                        <form action="{{ route('cart.add') }}" method="POST" class="flex items-center">
                            @csrf
                            <input type="hidden" name="food_item_id" value="{{ $foodItem->id }}">
                            <input type="number" name="quantity" value="1" min="1" class="w-20 mr-4 p-2 border rounded">
                            <button type="submit" class="bg-red-600 text-white py-2 px-6 rounded hover:bg-red-700 transition">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                @else
                    <div class="mt-6">
                        <p class="text-gray-600">
                            <a href="{{ route('login') }}" class="text-red-600 underline">Login</a> to add this item to cart
                        </p>
                    </div>
                @endauth
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('div.min-h-screen').classList.remove('bg-gray-100');
        });
    </script>
@endpush
