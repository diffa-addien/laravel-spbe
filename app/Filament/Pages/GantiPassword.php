<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rules\Password;
use Filament\Actions\Action;

class GantiPassword extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.ganti-password';
    
    // Sembunyikan dari menu navigasi utama
    protected static bool $shouldRegisterNavigation = false; 

    public ?string $current_password = '';
    public ?string $new_password = '';
    public ?string $new_password_confirmation = '';

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('current_password')
                ->label('Password Saat Ini')
                ->password()
                ->required()
                ->currentPassword(), // Validasi otomatis dari Filament

            TextInput::make('new_password')
                ->label('Password Baru')
                ->password()
                ->required()
                ->rule(Password::min(8)) // Aturan kekuatan password
                ->different('current_password')
                ->confirmed(),

            TextInput::make('new_password_confirmation')
                ->label('Konfirmasi Password Baru')
                ->password()
                ->required(),
        ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('updatePassword')
                ->label('Simpan Perubahan')
                ->submit('updatePassword'),
        ];
    }

    public function updatePassword(): void
    {
        $data = $this->form->getState();

        auth()->user()->update([
            'password' => Hash::make($data['new_password']),
        ]);

        Notification::make()
            ->title('Password berhasil diperbarui')
            ->success()
            ->send();
        
        $this->form->fill(); // Kosongkan form setelah berhasil
    }
}