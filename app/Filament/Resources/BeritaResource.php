<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;

// Import komponen Spatie
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    // protected static ?string $navigationGroup = 'Berita';
    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita';
    protected static ?string $modelLabel = 'Data';
    protected static ?int $navigationSort = 4;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\Select::make('kategori')
                            ->options([
                                'Pemerintahan' => 'Pemerintahan',
                                'Sosial' => 'Sosial',
                                'Ekonomi' => 'Ekonomi',
                                'Pendidikan' => 'Pendidikan',
                                'Kesehatan' => 'Kesehatan',
                            ])
                            ->required(),

                        Forms\Components\Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'archived' => 'Archived',
                            ])
                            ->required()
                            ->default('draft'),

                        Forms\Components\Select::make('user_id')
                            ->label('Penulis')
                            ->relationship('penulis', 'name')
                            ->searchable()
                            ->required()
                            ->default(auth()->id()),

                        // GANTI FileUpload dengan SpatieMediaLibraryFileUpload
                        SpatieMediaLibraryFileUpload::make('gambar')
                            ->collection('berita')
                            ->disk('public_uploads') // <-- TAMBAHKAN BARIS INI
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('isi_berita')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // GANTI ImageColumn dengan SpatieMediaLibraryImageColumn
                SpatieMediaLibraryImageColumn::make('gambar')
                    ->label('Gambar Utama')
                    ->collection('berita')
                    ->disk('public_uploads')
                    ->stacked()
                    ->limit(1)
                    ->limitedRemainingText(),

                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kategori')
                    ->searchable()
                    ->badge(),

                Tables\Columns\TextColumn::make('penulis.name')
                    ->label('Penulis')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        'archived' => 'warning',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeritas::route('/'),
            // 'create' => Pages\CreateBerita::route('/create'),
            // 'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}