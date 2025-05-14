@extends('layouts.app')

@section('title', 'Admin - Manage Food Items')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ isset($foodItem) ? 'Edit Food Item' : 'Create New Food Item' }}</h1>
        <form action="{{ isset($foodItem) ? route('admin.panel.food-items.update', $foodItem->id) : route('admin.panel.food-items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($foodItem))
                @method('PUT')
            @endif
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-white">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md text-black" value="{{ $foodItem->name ?? '' }}" required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-white">Price</label>
                <input type="number" name="price" id="price" class="mt-1 p-2 w-full border rounded-md text-black" value="{{ $foodItem->price ?? '' }}" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-white">Image</label>
                <input type="file" name="image" id="image" class="mt-1 p-2 w-full border rounded-md text-black" {{ isset($foodItem) ? '' : 'required' }}>
            </div>
            <button type="submit" class="{{ isset($foodItem) ? 'bg-red-500' : 'bg-gray-500' }} text-white px-4 py-2 rounded">
                {{ isset($foodItem) ? 'Update' : 'Create' }}
            </button>
        </form>

        @if(auth()->check())
            <div class="mt-4">
                <a href="{{ route('menu') }}" class="bg-green-500 text-white px-4 py-2 rounded">Back to Menu</a>
            </div>
        @endif

        <h2 class="text-2xl font-bold my-4">Food Items</h2>
        <a href="{{ route('admin.panel.food-items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Food Item</a>

        <div class="mt-4">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 text-black">Name</th>
                        <th class="py-2 text-black">Price</th>
                        <th class="py-2 text-black">Image URL</th>
                        <th class="py-2 text-black">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($foodItems as $item)
                        <tr>
                            <td class="border px-4 py-2 text-black">{{ $item->name }}</td>
                            <td class="border px-4 py-2 text-black">Rs. {{ $item->price }}/=</td>
                            <td class="border px-4 py-2 text-black">{{ $item->image_url }}</td>
                            <td class="border px-4 py-2 text-black">
                                <a href="{{ route('admin.panel.food-items.edit', $item->id) }}" class="text-blue-500">Edit</a>
                                <form action="{{ route('admin.panel.food-items.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
