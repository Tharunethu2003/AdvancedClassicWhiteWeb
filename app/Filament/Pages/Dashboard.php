<?php


namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\User;
use App\Models\Order;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    
}
