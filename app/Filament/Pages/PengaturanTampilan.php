<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Spatie\Valuestore\Valuestore;

class PengaturanTampilan extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static string $view = 'filament.pages.pengaturan-tampilan';
    protected static ?string $navigationLabel = 'Gambar Latar';
    protected static ?int $navigationSort = 0; // Agar menunya di bagian bawah

    public ?array $data = [];
    protected Valuestore $settings;

    public function __construct()
    {
        $this->settings = Valuestore::make(storage_path('app/settings.json'));
    }

    public function mount(): void
    {
        $this->data['hero_image'] = $this->settings->get('hero_image');
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('hero_image')
                    ->label('Gambar Latar Utama')
                    ->disk('public_uploads')
                    ->directory('hero')
                    ->image()
                    ->helperText('Unggah gambar baru untuk mengganti gambar latar di halaman utama.')
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Perubahan')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $this->settings->put('hero_image', $data['hero_image']);

        Notification::make()
            ->title('Pengaturan berhasil disimpan')
            ->success()
            ->send();
    }
}