<?php

namespace App\Filament\Resources\CompanyInfos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CompanyInfoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_name')
                    ->required(),
                TextInput::make('short_description'),
                Textarea::make('full_description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('vision')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('mission')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('instagram'),
                TextInput::make('legalitas'),
            ]);
    }
}
