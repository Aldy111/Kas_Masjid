<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Petugas;
use App\Models\Jabatan;
use App\Exports\PetugasExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;
Use Alert;



class PetugasController extends Controller
{
    public function apiPetugas()
    {
        //menampilkan seluruh data
        //$pegawai = Pegawai::all();
        $petugas = Petugas::join('jabatan', 'jabatan.id', '=', 'petugas.jabatan_id')
                    ->select('petugas.kode_petugas','petugas.nama','petugas.gender',
                    'jabatan.nama_jabatan AS posisi','petugas.tgl_lahir','petugas.tmp_lahir','petugas.alamat') 
                    ->get();
        return response()->json(
            [
                'success'=>true,
                'message'=>'Data Petugas',
                'data'=>$petugas,
            ],200);
    }

    public function apiPetugasDetail($id)
    {
        //menampilkan detail data seorang petugas
        //$petugas = Petugas::find($id);
        $petugas = Petugas::join('jabatan', 'jabatan.id', '=', 'petugas.jabatan_id')
                    ->select('petugas.kode_petugas','petugas.nama','petugas.gender',
                    'jabatan.nama_jabatan AS posisi','petugas.tgl_lahir','petugas.tmp_lahir','petugas.alamat')
                    ->where('petugas.id', '=', $id) 
                    ->get();
        
        if($petugas){ //jika data petugas ditemukan
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Detail Petugas',
                    'data'=>$petugas,
                ],200);
        }
        else{ //jika data petugas tidak ditemukan
            return response()->json(
                [
                    'success'=>false,
                    'message'=>'Detail Pegawai Tidak ditemukan',
                ],404);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $petugas = Petugas::orderBy('id', 'DESC')->get();
        return view('petugas.index',compact('petugas'));
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
        $ar_jabatan = Jabatan::all();
        $ar_status = ['Menikah','Belum Menikah'];
        $ar_gender = ['L','P'];
        //arahkan ke form input data
        return view('petugas.form',compact('ar_jabatan','ar_status','ar_gender'));
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
            'kode_petugas' => 'required|unique:petugas|max:3',
            'nama' => 'required|max:45',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'nullable|string|min:10',
            'gender' => 'required',
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'jabatan_id' => 'required|integer',
        ],
        //custom pesan errornya
        [
            'kode_petugas.required'=>'Kode Petugas Wajib Diisi',
            'kode_petugas.unique'=>'Kode Petugas Sudah Ada (Terduplikasi)',
            'kode_petugas.max'=>'Kode Petugas Maksimal 3 karakter',
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Nama Maksimal 45 karakter',
            'tmp_lahir.required'=>'Tempat Lahir Wajib Diisi',
            'tgl_lahir.required'=>'Tanggal Lahir Wajib Diisi',
            'jabatan_id.required'=>'Jabatan Wajib Diisi',
            'jabatan_id.integer'=>'Jabatan Wajib Diisi Berupa dari Pilihan yg Tersedia',
            'gender.required'=>'Jenis Kelamin Wajib Diisi',
            'status.required'=>'Status Wajib Diisi',
            'foto.image'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.mimes'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.max'=>'Ukuran Foto Maksimal 2048',
            'alamat.min'=>'Alamat Minimal 10 Karakter',

        ]
    );
        //Petugas::create($request->all());
        //------------apakah user  ingin upload foto-----------
        if(!empty($request->foto)){
            $fileName = 'foto-'.$request->nama.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/img'),$fileName);
        }
        else{
            $fileName = '';
        }
        //lakukan insert data dari request form
        DB::table('petugas')->insert(
            [
                'kode_petugas'=>$request->kode_petugas,
                'nama'=>$request->nama,
                'tmp_lahir'=>$request->tmp_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'alamat'=>$request->alamat,
                'gender'=>$request->gender,
                'status'=>$request->status,
                'foto'=>$fileName,
                'jabatan_id'=>$request->jabatan_id,
                'created_at'=>now(),
            ]);
        return redirect()->route('petugas.index')
                        ->with('success','Data Petugas Baru Berhasil Disimpan');
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
        $row = Petugas::find($id);
        return view('petugas.form_edit',compact('row'));
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
            'nama' => 'required|max:45',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'nullable|string|min:10',
            'gender' => 'required',
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'jabatan_id' => 'required|integer',
            'updated_at'=>now(),
        ],
        [
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Nama Maksimal 45 karakter',
            'tmp_lahir.required'=>'Tempat Lahir Wajib Diisi',
            'tgl_lahir.required'=>'Tanggal Lahir Wajib Diisi',
            'jabatan_id.required'=>'Jabatan Wajib Diisi',
            'jabatan_id.integer'=>'Jabatan Wajib Diisi Berupa dari Pilihan yg Tersedia',
            'gender.required'=>'Jenis Kelamin Wajib Diisi',
            'status.required'=>'Status Wajib Diisi',
            'foto.image'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.mimes'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.max'=>'Ukuran Foto Maksimal 2048',
        ]
    );
        //------------foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('petugas')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user ingin ganti foto lama-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
            //proses foto lama ganti foto baru
            $fileName = 'foto-'.$request->nama.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/img'),$fileName);
        }
        //------------tidak berniat ganti ganti foto lama-----------
        else{
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('petugas')->where('id',$id)->update(
            [
                //'kode_petugas'=>$request->kode_petugas,
                'nama'=>$request->nama,
                'tmp_lahir'=>$request->tmp_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'alamat'=>$request->alamat,
                'gender'=>$request->gender,
                'status'=>$request->status,
                'foto'=>$fileName,
                'jabatan_id'=>$request->jabatan_id,
                'updated_at'=>now(),
            ]);
        return redirect('/petugas'.'/'.$id)
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
        // hapus file
		// $gambar = Gambar::where('id',$id)->first();
		// File::delete('data_file/'.$gambar->file);
 
		// hapus data
		// Gambar::where('id',$id)->delete();
 
		// return redirect()->back();
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = Petugas::find($id);
        if(!empty($row->foto)) unlink(base_path('public/admin/img/'.$row->foto));
        //setelah itu baru hapus data pegawai
        Petugas::where('id',$id)->delete();
        return redirect()->route('petugas.index')
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
    public function petugasPDF()
    {
        $petugas = Petugas::all();
            
        $pdf = PDF::loadView('petugas.petugasPDF', ['petugas'=>$petugas]);
        return $pdf->download('data_petugas.pdf');
    }
    public function petugasExcel() 
    {
        return Excel::download(new PetugasExport, 'data_petugas.xlsx');
    }
}