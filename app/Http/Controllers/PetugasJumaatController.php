<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\PetugasJumaat;
use App\Models\Bagian;
use App\Models\Petugas;
use App\Exports\PetugasJumaatExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;

class PetugasJumaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $petugasJ = PetugasJumaat::orderBy('id', 'DESC')->get();
        return view('petugasJumaat.index',compact('petugasJ'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //ambil master untuk dilooping di select option
        $ar_petugas = Petugas::all();
        $ar_bagian = Bagian::all();
        //arahkan ke form input data
        return view('petugasJumaat.form',compact('ar_petugas','ar_bagian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses input petugas Jumaat
        $request->validate([
            'tgl' => 'required',
            'petugas_id' => 'required|integer',
            'bagian_id' => 'required|integer',
        ]);
        //Petugas::create($request->all());
        //lakukan insert data dari request form
        DB::table('petugas_jumaat')->insert(
            [
                'tgl'=>$request->tgl,
                'petugas_id'=>$request->petugas_id,
                'bagian_id'=>$request->bagian_id,
                'created_at'=>now(),
            ]);
        return redirect()->route('petugasJumaat.index')
                        ->with('success','Data Petugas Jumaat Baru Berhasil Disimpan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Petugas::find($id);
        return view('petugas.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = PetugasJumaat::find($id);
        return view('petugasJumaat.form_edit',compact('row'));
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
            // 'kode_petugas' => 'required|unique:petugas|max:3',
            'tgl' => 'required',
            'petugas_id' => 'required|integer',
            'bagian_id' => 'required|integer',
            'updated_at'=>now(),
        ]);
        //lakukan update data dari request form edit
        DB::table('petugas_jumaat')->where('id',$id)->update(
            [
                //'kode_petugas'=>$request->kode_petugas,
                'tgl'=>$request->tgl,
                'petugas_id'=>$request->petugas_id,
                'bagian_id'=>$request->bagian_id,
                'updated_at'=>now(),
            ]);
        return redirect('/petugasJumaat')
                        ->with('success','Data Petugas Berhasil Diubah');
        
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
        $row = PetugasJumaat::find($id);
        //setelah itu baru hapus data pegawai
        PetugasJumaat::where('id',$id)->delete();
        return redirect()->route('petugasJumaat.index')
                        ->with('success','Data Petugas Berhasil Dihapus');
    }
    public function generatePDF()
    {
        $data = [
            'title' => 'Test Penggunaan Extension PDF',
            'date' => date('m/d/Y'),
            'isi' => 'Menggunakan Pustaka barryvdh/laravel-dompdf'
        ]; 
            
        $pdf = PDF::loadView('petugas.myPDF', $data);
        return $pdf->download('testdownload.pdf');
    }
    public function petugasJumaatPDF()
    {
        $petugasJ = PetugasJumaat::all();
            
        $pdf = PDF::loadView('petugasJumaat.petugasJumaatPDF', ['petugasJ'=>$petugasJ]);
        return $pdf->download('data_petugas_jumaat.pdf');
    }
    public function petugasJumaatExcel() 
    {
        return Excel::download(new PetugasJumaatExport, 'data_petugas_jumaat.xlsx');
    }
}