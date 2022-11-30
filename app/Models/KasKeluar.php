<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasKeluar extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'kas_keluar';
    //mapping ke kolom/fieldnya
    protected $fillable = ['kode_kas','sumber','keterangan','pengeluaran'];
    //relasi one to many ke tabel pegawai
    public function laporan_kas()
    {
        return $this->hasMany(LaporanKas::class);
    }
}