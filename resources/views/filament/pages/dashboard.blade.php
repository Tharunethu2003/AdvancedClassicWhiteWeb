<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded shadow-sm">
            <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
            <p class="text-2xl text-gray-900">{{ $stats['total_users'] }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow-sm">
            <h3 class="text-lg font-semibold text-gray-700">Total Orders</h3>
            <p class="text-2xl text-gray-900">{{ $stats['total_orders'] }}</p>
        </div>
    </div>
</x-filament::page>
