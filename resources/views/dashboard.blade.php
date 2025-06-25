<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-6">🛍️ Daftar Barang</h3>

                @php
                    $products = [
    [
        'name' => 'Ponsel',
        'price' => 2500000,
        'rating' => 4.6,
        'image' => asset('images/ponsel.jpg'),
    ],
    [
        'name' => 'Blender',
        'price' => 450000,
        'rating' => 4.4,
        'image' => asset('images/blender.jpg'),
    ],
    [
        'name' => 'Sofa Minimalis',
        'price' => 3200000,
        'rating' => 4.9,
        'image' => asset('images/sofa.jpg'),
    ],
    [
        'name' => 'Foundation',
        'price' => 120000,
        'rating' => 4.5,
        'image' => asset('images/foundation.jpg'),
    ],
    [
        'name' => 'Sabun Mandi Cair',
        'price' => 25000,
        'rating' => 4.3,
        'image' => asset('images/sabun.jpg'),
    ],
    [
        'name' => 'Sapu Lantai',
        'price' => 30000,
        'rating' => 4.2,
        'image' => asset('images/sapu.jpg'),
    ],
    [
        'name' => 'Novel Fiksi',
        'price' => 80000,
        'rating' => 4.7,
        'image' => asset('images/novel.jpg'),
    ],
    [
        'name' => 'Pulpen Gel Hitam',
        'price' => 5000,
        'rating' => 4.1,
        'image' => asset('images/pulpen.jpg'),
    ],
];

                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <div class="border border-gray-300 rounded-lg shadow hover:shadow-lg transition duration-200 overflow-hidden">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h4 class="text-lg font-semibold mb-2">{{ $product['name'] }}</h4>
                                <p class="text-sm text-gray-700 mb-1">Harga: Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
                                <p class="text-sm text-yellow-600 mb-3">Rating: {{ $product['rating'] }} ★</p>
                                <button class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600 transition">
                                    Beli
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
