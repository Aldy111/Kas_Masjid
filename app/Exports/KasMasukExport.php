<?php

namespace App\Exports;

use App\Models\KasMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class KasMasukExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_km = DB::table('kas_masuk') 
        ->select('kas_masuk.kode_kas','kas_masuk.sumber','kas_masuk.tanggal','kas_masuk.Pemasukan','kas_masuk.keterangan') 
        ->get(); 
        return $ar_km;

    }
    public function headings(): array
    {
        return ["Kode Kas", "Sumber", "Tanggal", "Pemasukan", "Keterangan"];
    }
}
