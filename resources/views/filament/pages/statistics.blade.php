<x-filament::page>
    <div class="space-y-4">
        <h1 style="font-size: 2rem; font-weight: 600; color: rgb(146, 135, 153);">Website Statistics</h1>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
            <!-- Total Users -->
            <div style="background-color: rgb(213, 198, 218); padding: 16px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <h3 style="font-size: 1.25rem; font-weight: 500; color: #4B5563;">Total Users</h3>
                <p style="font-size: 2rem; font-weight: 700; color: #111827;">{{ $userCount }}</p>
            </div>

            <!-- Total Products -->
            <div style="background-color: rgb(196, 159, 189); padding: 16px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <h3 style="font-size: 1.25rem; font-weight: 500; color: #4B5563;">Total Products</h3>
                <p style="font-size: 2rem; font-weight: 700; color: #111827;">{{ $productCount }}</p>
            </div>

            <!-- Total Reviews -->
            <div style="background-color: rgb(167, 108, 214); padding: 16px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <h3 style="font-size: 1.25rem; font-weight: 500; color: #4B5563;">Total Reviews</h3>
                <p style="font-size: 2rem; font-weight: 700; color: #111827;">{{ $reviewCount }}</p>
            </div>

            <!-- Total Orders with Circle Display for First Digit -->
            <div style="background-color: rgb(135, 97, 121); padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15); display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h3 style="font-size: 1.25rem; font-weight: 500; color:rgb(235, 226, 238);">Total Orders</h3>
                </div>
                <div style="background-color: #fff; color: rgb(167, 108, 214); border-radius: 50%; width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; font-size: 1.5rem; font-weight: bold;">
                    {{ substr($orderCount, 0, 1) }} <!-- Display the first digit as a circle -->
                </div>
            </div>
        </div>

        <!-- User Statistics Chart -->
        <div style="background-color: rgba(247, 242, 248, 0.89); padding: 20px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); margin-top: 30px;">
            <h3 style="font-size: 1.5rem; font-weight: 600; color: rgb(135, 97, 121);">Users Over Time (Last 6 Months)</h3>
            <canvas id="userChart"></canvas> <!-- Chart.js Canvas -->
        </div>

        <!-- Most Popular Products (Hardcoded) -->
        <div style="background-color: rgb(245, 245, 245); padding: 20px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); margin-top: 30px;">
            <h3 style="font-size: 1.5rem; font-weight: 600; color: rgb(135, 97, 121);">Most Popular Products</h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-top: 20px;">
                <!-- Popular Product 1 -->
                <div style="background-color: rgb(133, 73, 154); padding: 16px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                    <h4 style="font-size: 1.25rem; font-weight: 500; color:rgb(226, 216, 225);">Anti Bleamish Pigmentation Cream</h4>
                    <p style="font-size: 1.25rem; font-weight: 600; color:rgb(207, 161, 195);">Orders: 120</p>
                </div>
                <!-- Popular Product 2 -->
                <div style="background-color: rgb(116, 56, 137); padding: 16px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                    <h4 style="font-size: 1.25rem; font-weight: 500; color:rgb(209, 215, 223);">Sun Cream</h4>
                    <p style="font-size: 1.25rem; font-weight: 600; color: rgb(179, 161, 175)">Orders: 98</p>
                </div>
                <!-- Popular Product 3 -->
                <div style="background-color: rgb(91, 33, 112); padding: 16px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                    <h4 style="font-size: 1.25rem; font-weight: 500; color:rgb(239, 227, 232);">Day Lotion</h4>
                    <p style="font-size: 1.25rem; font-weight: 600; color: rgb(186, 158, 179)">Orders: 85</p>
                </div>
            </div>
        </div>
        
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($userData->pluck('month')->map(function($month) {
                    return \Carbon\Carbon::create()->month($month)->format('M'); // Format months as abbreviations
                })), // X-axis labels (months)
                datasets: [{
                    label: 'Total Users',
                    data: @json($userData->pluck('count')), // Y-axis data (user count)
                    borderColor: 'rgb(119, 89, 144)',
                    backgroundColor: 'rgba(167, 108, 214, 0.2)',
                    tension: 0.1,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month',
                            color: '#4B5563',
                            font: {
                                weight: 'bold',
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Users',
                            color: '#4B5563',
                            font: {
                                weight: 'bold',
                            }
                        }
                    }
                }
            }
        });
    </script>
    @endpush
</x-filament::page>
