<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\KasMasuk;
use App\Exports\KasMasukExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;

class KasMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $km = KasMasuk::orderBy('id', 'DESC')->get();
        return view('kas_masuk.index',compact('km'));
    }
    public function create()
    {
        //arahkan ke form input data
        return view('kas_masuk.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses input petugas
        $request->validate([
            'kode_kas' => 'required|unique:kas_masuk|max:7',
            'sumber' => 'required|max:45',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'Pemasukan' => 'required|integer'
        ]);
        //Petugas::create($request->all());
        //lakukan insert data dari request form
        DB::table('kas_masuk')->insert(
            [
                'kode_kas'=>$request->kode_kas,
                'sumber'=>$request->sumber,
                'keterangan'=>$request->keterangan,
                'tanggal'=>$request->tanggal,
                'Pemasukan'=>$request->Pemasukan,
                'created_at'=>now(),
            ]);
        return redirect()->route('kas_masuk.index')
                        ->with('success','Data Kas Masuk Baru Berhasil Disimpan');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = KasMasuk::find($id);
        return view('kas_masuk.form_edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'kode_kas' => 'required|unique:kas_masuk|max:7',
            'sumber' => 'required|max:45',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'Pemasukan' => 'required|integer'
        ]);
        //lakukan update data dari request form edit
        DB::table('kas_masuk')->where('id',$id)->update(
            [
                //'kode_petugas'=>$request->kode_petugas,
                'sumber'=>$request->sumber,
                'keterangan'=>$request->keterangan,
                'tanggal'=>$request->tanggal,
                'Pemasukan'=>$request->Pemasukan,
                'updated_at'=>now(),
            ]);
        return redirect('/kas_masuk')
                        ->with('success','Data Kas Masuk Berhasil Diubah');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = KasMasuk::find($id);
        //setelah itu baru hapus data pegawai
        KasMasuk::where('id',$id)->delete();
        return redirect()->route('kas_masuk.index')
                        ->with('success','Data Petugas Berhasil Dihapus');
    }
    public function kas_masukPDF()
    {
        $km = KasMasuk::all();
            
        $pdf = PDF::loadView('kas_masuk.kas_masukPDF', ['km'=>$km]);
        return $pdf->download('data_kas_masuk.pdf');
    }
    public function kas_masukExcel() 
    {
        return Excel::download(new KasMasukExport, 'data_kas_masuk.xlsx');
    }


}