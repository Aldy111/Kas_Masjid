<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'jabatan';
    //mapping ke kolom/fieldnya
    protected $fillable = ['kode_jabatan','nama_jabatan'];
    //relasi one to many ke tabel pegawai
    public function petugas()
    {
        return $this->hasMany(Petugas::class);
    }
}