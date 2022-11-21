<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'bagian';
    //mapping ke kolom/fieldnya
    protected $fillable = ['nama'];
    //relasi one to many ke tabel pegawai
    public function petugas_jumaat()
    {
        return $this->hasMany(PetugasJumaat::class);
    }
}