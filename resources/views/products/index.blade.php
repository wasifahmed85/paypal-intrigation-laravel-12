<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 p-28">
    <section class="grid grid-cols-3 gap-4 mx-auto w-full container">
    @foreach ($products as $product)
        <div
            class="max-w-sm rounded-lg overflow-hidden shadow-xl hover:scale-105 transition-transform duration-300 bg-white">
            <!-- Product Image -->
            <img class="w-full h-70 object-cover" src="https://dummyimage.com/600x600/000/fff&text={{ $product->name }}"
                alt="{{ $product->name }}">

            <!-- Product Details -->
            <div class="px-6 py-6 text-center">
                <!-- Product Title -->
                <h3
                    class="text-2xl font-semibold text-gray-800 truncate hover:text-gray-600 transition-colors duration-300">
                    {{ $product->name }}</h3>

                <!-- Product Price -->
                <p class="text-xl text-gray-600 mt-2">${{$product->price}}</p>

                <!-- Hover Effect for Button -->
                <div class="mt-4">
                    <a href="{{ route('paypal.paymentLink', $product->id) }}"
                        class="w-20 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Pay</a>
                </div>
            </div>
        </div>
    @endforeach
    </section>
</body>


</html>
