<?php

namespace App\Exports;

use App\Models\KasKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class KasKeluarExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_kk = DB::table('kas_keluar') 
        ->select('kas_keluar.kode_kas','kas_keluar.sumber','kas_keluar.tanggal','kas_keluar.pengeluaran','kas_keluar.keterangan') 
        ->get(); 
        return $ar_kk;

    }
    public function headings(): array
    {
        return ["Kode Kas", "Sumber", "Tanggal", "Pengeluaran", "Keterangan"];
    }
}
