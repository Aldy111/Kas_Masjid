<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\KasKeluar;
use DB;

class KasKeluar2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $kk = KasKeluar::orderBy('id', 'DESC')->get();
        return view('landingpage.kaskeluar',compact('kk'));
    }
    public function create()
    {
        //arahkan ke form input data
        return view('kas_keluar.form');
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
            'kode_kas' => 'required|unique:kas_keluar|max:7',
            'sumber' => 'required|max:45',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'pengeluaran' => 'required|integer'
        ],
        //custom pesan errornya
        [
            'kode_kas.required'=>'Kode Petugas Wajib Diisi',
            'kode_kas.unique'=>'Kode Kas Keluar Sudah Ada (Terduplikasi)',
            'kode_kas.max'=>'Kode Kas keluar Maksimal 7 karakter',
            'sumber.required'=>'Sumber Wajib Diisi',
            'sumber.max'=>'Sumber Maksimal 45 karakter',
            'keterangan.required'=>'Keterangan Wajib di Isi',
            'tanggal.required'=>'Tanggal Kas Keluar Wajib Diisi',
            'pengeluaran.required'=>'pengeluaran Wajib di Isi',
            'pengeluaran.integer'=>'pengeluaran Wajib di Isi Berupa Angka',
        ]);
        //Petugas::create($request->all());
        //lakukan insert data dari request form
        DB::table('kas_keluar')->insert(
            [
                'kode_kas'=>$request->kode_kas,
                'sumber'=>$request->sumber,
                'keterangan'=>$request->keterangan,
                'tanggal'=>$request->tanggal,
                'pengeluaran'=>$request->pengeluaran,
                'created_at'=>now(),
            ]);
        return redirect()->route('kas_keluar.index')
                        ->with('success','Data Kas Keluar Baru Berhasil Disimpan');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = KasKeluar::find($id);
        return view('kas_keluar.form_edit',compact('row'));
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
            'pengeluaran' => 'required|integer'
        ],
        //custom pesan errornya
        [
            'sumber.required'=>'Sumber Wajib Diisi',
            'sumber.max'=>'Sumber Maksimal 45 karakter',
            'keterangan.required'=>'Keterangan Wajib di Isi',
            'tanggal.required'=>'Tanggal Kas Keluar Wajib Diisi',
            'pengeluaran.required'=>'pengeluaran Wajib di Isi',
            'pengeluaran.integer'=>'pengeluaran Wajib di Isi Berupa Angka',
        ]);
        //lakukan update data dari request form edit
        DB::table('kas_keluar')->where('id',$id)->update(
            [
                //'kode_petugas'=>$request->kode_petugas,
                'sumber'=>$request->sumber,
                'keterangan'=>$request->keterangan,
                'tanggal'=>$request->tanggal,
                'pengeluaran'=>$request->pengeluaran,
                'updated_at'=>now(),
            ]);
        return redirect('/kas_keluar')
                        ->with('success','Data Kas Keluar Berhasil Diubah');
        
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
        $row = KasKeluar::find($id);
        //setelah itu baru hapus data pegawai
        KasKeluar::where('id',$id)->delete();
        return redirect()->route('kas_keluar.index')
                        ->with('success','Data Kas Keluar Berhasil Dihapus');
    }
    public function kas_keluarPDF()
    {
        $kk = KasKeluar::all();
            
        $pdf = PDF::loadView('kas_keluar.kas_keluarPDF', ['kk'=>$kk]);
        return $pdf->download('data_kas_keluar.pdf');
    }
    public function kas_keluarExcel() 
    {
        return Excel::download(new KasKeluarExport, 'data_kas_keluar.xlsx');
    }


}