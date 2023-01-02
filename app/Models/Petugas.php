<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Petugas extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'petugas';
    //mapping ke kolom/fieldnya
    protected $fillable = ['kode_petugas','nama','tmp_lahir','tgl_lahir','alamat',
                            'gender','no_hp','status','foto','jabatan_id'];
    //relasi one to many ke tabel pelatihan
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
    public function petugas_jumaat()
    {
        return $this->hasMany(PetugasJumaat::class);
    }
    public function laporan_kas()
    {
        return $this->hasMany(LaporanKas::class);
    }

    //tabel relasi merujuk/merefer ke tabel master/acuan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}