<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationLabel = 'Reviews';
    protected static ?string $navigationGroup = 'Product Management';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('content')
                    ->label('Review Content')
                    ->required(),

                Forms\Components\Select::make('rating')
                    ->label('Rating')
                    ->options([
                        1 => '1 Star',
                        2 => '2 Stars',
                        3 => '3 Stars',
                        4 => '4 Stars',
                        5 => '5 Stars',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),

                TextColumn::make('content')
                    ->label('Review Content')
                    ->searchable(),

                TextColumn::make('rating')
                    ->label('Rating'),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('M j, Y, g:i a')
                    ->sortable(),
            ])
            ->filters([
                // You can add filters for the reviews here, if needed.
            ])
            ->actions([
                DeleteAction::make()
                    ->label('Delete')
                    ->color('danger') // Optional: Add a danger color for the delete action
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
