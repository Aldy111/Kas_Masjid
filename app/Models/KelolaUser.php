<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaUser extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'users';
    //mapping ke kolom/fieldnya
    protected $fillable = ['name','email','password','role','isactive'];
}