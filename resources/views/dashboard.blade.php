<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Navbar + Search --}}
    <div class="bg-white shadow-sm py-4 px-6 flex justify-between items-center">
        <h1 class="text-5xl font-bold text-black">
            Rate<span class="text-orange-400">It</span>
        </h1>   
        <form method="GET" action="#" class="flex">
            <input type="text" name="search" placeholder="Cari produk..." class="border rounded-l px-3 py-1 focus:outline-none w-64">
            <button class="bg-indigo-600 text-white px-4 rounded-r hover:bg-indigo-700">Cari</button>
        </form>
    </div>

    {{-- Data Produk --}}
    @php
        $products = [
            ['name' => 'Ponsel', 'price' => 2500000, 'rating' => 4.6, 'image' => asset('images/ponsel.jpg')],
            ['name' => 'Blender', 'price' => 450000, 'rating' => 4.4, 'image' => asset('images/blender.jpg')],
            ['name' => 'Sofa Minimalis', 'price' => 3200000, 'rating' => 4.9, 'image' => asset('images/sofa.jpg')],
            ['name' => 'Foundation', 'price' => 120000, 'rating' => 4.5, 'image' => asset('images/foundation.jpg')],
            ['name' => 'Sabun Mandi Cair', 'price' => 25000, 'rating' => 4.3, 'image' => asset('images/sabun.jpg')],
            ['name' => 'Sapu Lantai', 'price' => 30000, 'rating' => 4.2, 'image' => asset('images/sapu.jpg')],
            ['name' => 'Novel Fiksi', 'price' => 80000, 'rating' => 4.7, 'image' => asset('images/novel.jpg')],
            ['name' => 'Pulpen Gel Hitam', 'price' => 5000, 'rating' => 4.1, 'image' => asset('images/pulpen.jpg')],
        ];
    @endphp

{{-- Slider --}}
<div class="py-6 px-6">
    <div class="relative w-full overflow-hidden rounded-lg shadow h-[500px] bg-gray-100">
        <div class="flex transition-transform duration-500 ease-in-out h-full" id="slider">
            @foreach ($products as $product)
                <div class="min-w-full h-full">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover">
                </div>
            @endforeach
        </div>

        {{-- Tombol navigasi slider --}}
        <button onclick="prevSlide()" class="absolute top-1/2 left-4 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
            ◀
        </button>
        <button onclick="nextSlide()" class="absolute top-1/2 right-4 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
            ▶
        </button>
    </div>
</div>



    {{-- Produk --}}
    <div class="py-4 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-6">🛍️ Daftar Barang</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <div class="border border-gray-200 rounded-lg shadow hover:shadow-lg transition overflow-hidden bg-white">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h4 class="text-lg font-semibold mb-1">{{ $product['name'] }}</h4>
                                <p class="text-sm text-gray-700">Harga: Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
                                <p class="text-sm text-yellow-600 mb-3">Rating: {{ $product['rating'] }} ★</p>
                                <button class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600 transition">Beli</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Slider Script --}}
    <script>
        let currentIndex = 0;
        function showSlide(index) {
            const slider = document.getElementById('slider');
            const totalSlides = slider.children.length;
            if (index < 0) index = totalSlides - 1;
            if (index >= totalSlides) index = 0;
            slider.style.transform = `translateX(-${index * 100}%)`;
            currentIndex = index;
        }
        function nextSlide() { showSlide(currentIndex + 1); }
        function prevSlide() { showSlide(currentIndex - 1); }
        setInterval(() => { nextSlide(); }, 5000);
    </script>
</x-app-layout>
