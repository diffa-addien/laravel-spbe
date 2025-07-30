<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Berita extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia; // Tambahkan InteractsWithMedia

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'isi_berita',
        // 'gambar', sudah ganti ke spatie media
        'user_id',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'gambar' => 'array', // Otomatis mengubah JSON gambar menjadi array PHP
    ];

    /**
     * Mendapatkan data penulis (user) yang terhubung dengan berita.
     */
    public function penulis(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}