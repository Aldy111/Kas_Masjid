<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'kas_masuk';
    //mapping ke kolom/fieldnya
    protected $fillable = ['kode_kas','sumber','tanggal','keterangan','Pemasukan'];
    //relasi one to many ke tabel pegawai
    public function laporan_kas()
    {
        return $this->hasMany(LaporanKas::class);
    }
}