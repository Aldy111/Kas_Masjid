<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kegiatan extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'kegiatan';
    //mapping ke kolom/fieldnya
    protected $fillable = ['judul_kegiatan','tgl_kegiatan','ket','foto','petugas_id'];
   
     //tabel relasi merujuk/merefer ke tabel master/acuan
    public function laporan_kas()
    {
        return $this->hasMany(LaporanKas::class);
    }
    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}