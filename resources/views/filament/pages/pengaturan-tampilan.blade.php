<x-filament-panels::page>
    <x-filament-panels::form wire:submit="save">
        {{-- Ini akan merender semua field yang kita definisikan di form() --}}
        {{ $this->form }}

        {{-- Ini akan merender tombol "Simpan Perubahan" --}}
        <x-filament-panels::form.actions
            :actions="$this->getFormActions()"
        />
    </x-filament-panels::form>
</x-filament-panels::page>