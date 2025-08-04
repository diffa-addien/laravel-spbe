<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndeksSpbeResource\Pages;
use App\Models\IndeksSpbe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class IndeksSpbeResource extends Resource
{
    protected static ?string $model = IndeksSpbe::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Indeks SPBE';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(3000)
                    ->unique(ignoreRecord: true)
                    ->label('Tahun'),
                Forms\Components\TextInput::make('nilai_indeks')
                    ->required()
                    ->numeric()
                    ->label('Nilai Indeks'),
                Forms\Components\TextInput::make('predikat')
                    ->required()
                    ->maxLength(255)
                    ->label('Predikat (Cth: Baik, Cukup)'),
                SpatieMediaLibraryFileUpload::make('laporan')
                    ->collection('indeks-laporan')
                    ->disk('public_uploads')
                    ->label('Gambar Laporan (Chart & Tabel)')
                    ->image()
                    ->responsiveImages()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('laporan')
                    ->collection('indeks-laporan')
                    ->disk('public_uploads')
                    ->label('Gambar Laporan'),
                Tables\Columns\TextColumn::make('tahun')->sortable(),
                Tables\Columns\TextColumn::make('nilai_indeks')->sortable(),
                Tables\Columns\TextColumn::make('predikat')->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('tahun', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndeksSpbes::route('/'),
            // Hapus halaman create dan edit terpisah karena form bisa di modal
            // 'create' => Pages\CreateIndeksSpbe::route('/create'), 
            // 'edit' => Pages\EditIndeksSpbe::route('/{record}/edit'),
        ];
    }
}