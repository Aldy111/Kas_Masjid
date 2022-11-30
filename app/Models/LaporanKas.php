<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKas extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'laporan_kas';
    //mapping ke kolom/fieldnya
    protected $fillable = ['kas_masuk_id','kas_keluar_id','kegiatan_id'];
    //tabel relasi merujuk/merefer ke tabel master/acuan
    public function kas_masuk()
    {
        return $this->belongsTo(KasMasuk::class);
    }
    public function kas_keluar()
    {
        return $this->belongsTo(KasKeluar::class);
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}