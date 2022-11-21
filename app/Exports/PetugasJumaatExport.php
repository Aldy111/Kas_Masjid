<?php

namespace App\Exports;

use App\Models\PetugasJumaat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PetugasJumaatExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Petugas::all();
        $ar_petugasJ = DB::table('petugas_jumaat') 
        ->join('petugas', 'petugas.id', '=', 'petugas_jumaat.petugas_id') 
        ->join('bagian', 'bagian.id', '=', 'petugas_jumaat.bagian_id')
        ->select('petugas_jumaat.tgl','petugas.nama AS petugasJumaat','bagian.nama AS bagianJumaat') 
        ->get(); 
        return $ar_petugasJ;

    }
    public function headings(): array
    {
        return ["Tanggal", "Nama Petugas", "Tugas Jumaat"];
    }
}
