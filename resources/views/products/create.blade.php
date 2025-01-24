@foreach($products as $product)
    <div class="text-center">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full mb-4">
        <p class="font-semibold">{{ $product->name }}</p>
        <p class="text-gray-700">Rs. {{ $product->price }}</p>
        <a href="{{ route('products.edit', $product) }}" class="bg-gray-800 text-white py-2 px-4 rounded mt-4">EDIT</a>
        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded mt-4">DELETE</button>
        </form>
    </div>
@endforeach
