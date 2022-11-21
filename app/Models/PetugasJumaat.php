<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasJumaat extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'petugas_jumaat';
    //mapping ke kolom/fieldnya
    protected $fillable = ['tgl','petugas_id','bagian_id'];
    //tabel relasi merujuk/merefer ke tabel master/acuan
    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }
    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}