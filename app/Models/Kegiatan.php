<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Kegiatan extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'nama_kegiatan',
        'slug',
        'kategori',
        'tanggal_kegiatan',
        'deskripsi',
        'user_id',
        'status',
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Otomatis mengisi user_id saat data baru dibuat
        static::creating(function ($kegiatan) {
            if (auth()->check()) {
                $kegiatan->user_id = auth()->id();
            }
        });
    }
}