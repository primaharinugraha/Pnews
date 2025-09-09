<?php

namespace App\Filament\Resources\News\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Database\Eloquent\Factories\Relationship;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('author_id')
                ->relationship('author', 'name')
                ->required(),
                Select::make('news_category_id')
                ->relationship('newsCategory', 'title')
                ->required(),
                TextInput::make('title')
                ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->readOnly(),
                FileUpload::make('thumbnail')
                ->disk('public')            // simpan di storage/app/public
                ->directory('thumbnails') // biar rapi
                ->required()
                ->columnSpanFull(),
                RichEditor::make('content')
                ->required()
                ->columnspanFull(),
                ToggleColumn::make('is_featured')
                ->label('featured'),
           
            ]);
    }
}
