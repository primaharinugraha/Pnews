<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('ussername')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('avatar')
                    ->image()
                    ->directory('avatar')
                    ->disk('public') 
                    ->required(),
                Textarea::make('bio')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
