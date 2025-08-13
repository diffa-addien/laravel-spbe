<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LayananAplikasiResource\Pages;
use App\Models\LayananAplikasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class LayananAplikasiResource extends Resource
{
    protected static ?string $model = LayananAplikasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationLabel = 'Layanan Aplikasi';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_aplikasi')->required()->maxLength(255),
                Forms\Components\Textarea::make('deskripsi_singkat')->columnSpanFull(),
                Forms\Components\TextInput::make('link_url')->required()->url()->maxLength(255),
                Forms\Components\Select::make('kategori')
                    ->options(['Umum' => 'Umum', 'Khusus' => 'Khusus'])
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options(['Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif'])
                    ->required()->default('Aktif'),
                SpatieMediaLibraryFileUpload::make('ikon')
                    ->collection('ikon-aplikasi')
                    ->disk('public_uploads')
                    ->label('Ikon Aplikasi (PNG/SVG)')
                    ->image()
                    ->acceptedFileTypes(['image/png', 'image/svg+xml'])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('ikon')
                    ->collection('ikon-aplikasi')
                    ->disk('public_uploads'),
                Tables\Columns\TextColumn::make('nama_aplikasi')->searchable(),
                Tables\Columns\TextColumn::make('kategori')->badge(),
                Tables\Columns\TextColumn::make('status')->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Tidak Aktif' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('link_url')->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListLayananAplikasis::route('/')];
    }
}