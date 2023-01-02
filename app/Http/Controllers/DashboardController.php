<?php
namespace App\Http\Controllers;
use App\Models\Pegawai;
use App\Models\KasMasuk;
use App\Models\KasKeluar;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $ar_kekayaan = DB::table('pengurus')->select('nama','kekayaan')->get();
        $total_pemasukan = KasMasuk::select(DB::raw("CAST(SUM(Pemasukan)as int) as total_pemasukan"))
        ->groupBy(DB::raw("Month(tanggal)"))
        ->pluck('total_pemasukan');

        $bulan = KasMasuk::select(DB::raw("MONTHNAME(tanggal) as bulan"))
        ->groupBy(DB::raw("MONTHNAME(tanggal)"))
        ->orderBy('tanggal')
        ->pluck('bulan');

        $total_pengeluaran = KasKeluar::select(DB::raw("CAST(SUM(pengeluaran)as int) as total_pengeluaran"))
        ->groupBy(DB::raw("Month(tanggal)"))
        ->pluck('total_pengeluaran');
        

        $bulan2 = KasKeluar::select(DB::raw("MONTHNAME(tanggal) as bulan2"))
        ->groupBy(DB::raw("MONTHNAME(tanggal)"))
        ->orderBy('tanggal')
        ->pluck('bulan2');


        $ar_gender = DB::table('petugas')
                ->selectRaw('gender, count(gender) as jumlah')
                ->groupBy('gender')
                ->get();

        $ar_status = DB::table('petugas')
                ->selectRaw('status, count(status) as jumlah')
                ->groupBy('status')
                ->get();
        return view('dashboard.index', compact('ar_gender','ar_status','bulan','total_pemasukan','bulan2','total_pengeluaran'));
    }
}
