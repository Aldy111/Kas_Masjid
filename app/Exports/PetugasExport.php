<?php

namespace App\Exports;

use App\Models\Petugas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PetugasExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Petugas::all();
        $ar_petugas = DB::table('petugas') 
        ->join('jabatan', 'jabatan.id', '=', 'petugas.jabatan_id') 
        ->select('petugas.kode_petugas','petugas.nama','petugas.gender',
        'jabatan.nama_jabatan AS posisi','petugas.tgl_lahir','petugas.tmp_lahir','petugas.alamat') 
        ->get(); 
        return $ar_petugas;

    }
    public function headings(): array
    {
        return ["Kode Petugas", "Nama", "Jenis Kelamin", "Jabatan", "Tanggal Lahir", "Tempat Lahir", "Alamat"];
    }
}
