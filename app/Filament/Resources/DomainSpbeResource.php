<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DomainSpbeResource\Pages;
use App\Models\DomainSpbe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DomainSpbeResource extends Resource
{
    protected static ?string $model = DomainSpbe::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationLabel = 'Domain SPBE';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kategori')
                    ->options([
                        'Kebijakan' => 'Kebijakan',
                        'Tata Kelola' => 'Tata Kelola',
                        'Manajemen' => 'Manajemen',
                        'Layanan' => 'Layanan',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('nama_domain')->required()->maxLength(255),
                Forms\Components\TextInput::make('aspek')->required()->maxLength(255),
                Forms\Components\TextInput::make('indikator')->required()->maxLength(255),
                Forms\Components\Textarea::make('penjelasan')->required()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')->badge()->searchable(),
                Tables\Columns\TextColumn::make('nama_domain')->searchable(),
                Tables\Columns\TextColumn::make('aspek')->searchable(),
                Tables\Columns\TextColumn::make('indikator')->searchable()->limit(50),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'Kebijakan' => 'Kebijakan',
                        'Tata Kelola' => 'Tata Kelola',
                        'Manajemen' => 'Manajemen',
                        'Layanan' => 'Layanan',
                    ])
            ]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListDomainSpbes::route('/')];
    }
}