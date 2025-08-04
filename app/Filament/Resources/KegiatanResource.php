<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationLabel = 'Kegiatan';
    protected static ?string $pluralModelLabel = 'Kegiatan';
    protected static ?string $modelLabel = 'Data';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('nama_kegiatan')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),

                    Forms\Components\DatePicker::make('tanggal_kegiatan')
                        ->required(),

                    Forms\Components\Select::make('kategori')
                        ->options([
                            'Pemerintahan' => 'Pemerintahan',
                            'Sosial' => 'Sosial',
                            'Pendidikan' => 'Pendidikan',
                            'Infrastruktur' => 'Infrastruktur',
                        ])->required(),

                    Forms\Components\RichEditor::make('deskripsi')
                        ->columnSpanFull(),

                    SpatieMediaLibraryFileUpload::make('gambar')
                        ->collection('kegiatan-images')
                        ->disk('public_uploads')
                        ->multiple()
                        ->reorderable()
                        ->image()
                        ->label('Gambar Kegiatan')
                        ->columnSpanFull(),

                    SpatieMediaLibraryFileUpload::make('file_pendukung')
                        ->collection('kegiatan-files')
                        ->disk('public_uploads')
                        ->multiple()
                        ->reorderable()
                        ->label('File Pendukung (PDF, Doc, dll)')
                        ->downloadable() // <-- TAMBAHKAN INI untuk menampilkan file & link download
                        ->acceptedFileTypes([ // <-- TAMBAHKAN INI untuk membatasi tipe file
                            'application/pdf',
                            'application/msword',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                        ])
                        ->columnSpanFull(),

                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('gambar')
                    ->label('Gambar')
                    ->collection('kegiatan-images')
                    ->disk('public_uploads')
                    ->stacked()->limit(1)->limitedRemainingText(),

                Tables\Columns\TextColumn::make('nama_kegiatan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kategori')
                    ->badge()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_kegiatan')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Dibuat Oleh')
                    ->sortable(),

                Tables\Columns\TextColumn::make('media_count')
                    ->label('File Pendukung')
                    ->counts('media') // Menghitung semua media yang terhubung
                    ->formatStateUsing(function ($state, $record) {
                        // Ambil hanya file dari koleksi 'kegiatan-files'
                        $files = $record->getMedia('kegiatan-files');

                        if ($files->isEmpty()) {
                            return '-';
                        }

                        // Buat link untuk setiap file
                        return $files->map(function ($file) {
                            // Gunakan getUrl() untuk mendapatkan link unduhan
                            return '<a href="' . $file->getUrl() . '" target="_blank" class="text-blue-600 hover:underline">' . $file->name . '</a>';
                        })->implode('<br>'); // Pisahkan dengan baris baru jika ada lebih dari satu
                    })
                    ->html(), // Penting agar link bisa di-klik

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

    // METHOD BARU DITAMBAHKAN DI SINI
    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
    // ---------------------------------

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            // 'create' => Pages\CreateKegiatan::route('/create'),
            // 'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}