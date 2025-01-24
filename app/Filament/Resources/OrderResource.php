<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;

class OrderResource extends Resource
{
    protected static ?string $navigationGroup = 'Orders';
    
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('customer_name')
                    ->label('Customer Name')
                    ->disabled(),
                Forms\Components\TextInput::make('address')
                    ->label('Shipping Address')
                    ->disabled(),
                Forms\Components\TextInput::make('city')
                    ->label('City')
                    ->disabled(),
                Forms\Components\TextInput::make('zipcode')
                    ->label('Zip Code')
                    ->disabled(),
                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->disabled(),
                Forms\Components\Select::make('status')
                    ->label('Order Status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')->label('Customer Name'),
                TextColumn::make('address')->label('Shipping Address'),
                TextColumn::make('city')->label('City'),
                TextColumn::make('zipcode')->label('Zip Code'),
                TextColumn::make('phone')->label('Phone'),
                TextColumn::make('total_price')->label('Total Price')->money('inr'),
                SelectColumn::make('status')->label('Status')->options([
                    'pending' => 'Pending',
                    'confirmed' => 'Confirmed',
                    'shipped' => 'Shipped',
                    'delivered' => 'Delivered',
                    'cancelled' => 'Cancelled',
                ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                    ])
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
