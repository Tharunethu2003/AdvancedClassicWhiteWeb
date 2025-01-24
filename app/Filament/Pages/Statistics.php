<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class Statistics extends Page
{
    protected static ?string $navigationLabel = 'Statistics';
    protected static ?string $navigationGroup = 'Website Stats';
    protected static string $view = 'filament.pages.statistics';

    public $userCount;
    public $productCount;
    public $reviewCount;
    public $orderCount;
    public $userData;

    public function mount()
    {
        // Fetch statistics
        $this->userCount = User::count();  // Total users
        $this->productCount = \App\Models\Product::count();  // Total products
        $this->reviewCount = Review::count();  // Total reviews
        $this->orderCount = Order::count();  // Total orders

        // Get user count per month for the last 6 months
        $this->userData = User::select(DB::raw('MONTH(created_at) as month, COUNT(*) as count'))
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();
    }
}
