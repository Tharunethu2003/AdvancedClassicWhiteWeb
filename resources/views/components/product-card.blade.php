<div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between hover:shadow-xl transition-shadow duration-300 ease-in-out">
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-48 object-cover rounded-lg mb-4">

    <div class="flex flex-col">
        <h3 class="font-semibold text-lg text-gray-800 mb-2">{{ $title }}</h3>
        <p class="text-sm text-gray-600 mb-2">{{ $subtitle }}</p>
        <p class="text-sm text-gray-500 mb-4">{{ $description }}</p>
        
        <div class="flex justify-between items-center mt-4">
            <span class="text-xl font-bold text-gray-700">Rs. {{ number_format($price, 2) }}</span>
            <div class="space-x-3">
                <!-- Add to Cart Button with Hex Color -->
                <button class="px-3 py-1.5" style="background-color: #3b82f6; color: white; border-radius: 0.375rem; font-size: 0.875rem; transition: background-color 0.3s ease-in-out;" onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">Add to Cart</button>
                
                <!-- Add to Profile Button with Hex Color -->
            </div>
        </div>
    </div>
</div>
