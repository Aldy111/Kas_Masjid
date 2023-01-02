<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Petugas;
use App\Models\Kegiatan;
use App\Exports\KegiatanExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;
Use Alert;
class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $kegiatan = Kegiatan::orderBy('id', 'DESC')->get();
        return view('kegiatan.index',compact('kegiatan'));
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
        //arahkan ke form input data
        return view('kegiatan.form',compact('ar_petugas'));
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
            'judul_kegiatan' => 'required|max:45',
            'tgl_kegiatan' => 'required',
            'ket' => 'nullable|string|min:10',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'petugas_id' => 'required|integer',
        ],
        //custom pesan errornya
        [
            'judul_kegiatan.required'=>'Judul Kegiatan Wajib Diisi',
            'judul_kegiatan.max'=>'Judul Kegiatan Maksimal 45 karakter',
            'tgl_kegiatan.required'=>'Tanggal Kegiatan Wajib Diisi',
            'ket.min'=>'keterangan Minimal 10 Karakter ',
            'foto.required'=>'Foto Wajib di Upload',
            'foto.image'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.mimes'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.max'=>'Ukuran Foto Maksimal 2048',
            'petugas_id.required'=>'Petugas Wajib di Isi',
            'petugas_id.integer'=>'Petugas Wajib Diisi Berupa dari Pilihan yg Tersedia',

        ]);
        //Petugas::create($request->all());
        //------------apakah user  ingin upload foto-----------
        if(!empty($request->foto)){
            $fileName = 'foto-'.$request->judul_kegiatan.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/img'),$fileName);
        }
        else{
            $fileName = '';
        }
        //lakukan insert data dari request form
        DB::table('kegiatan')->insert(
            [
                'judul_kegiatan'=>$request->judul_kegiatan,
                'tgl_kegiatan'=>$request->tgl_kegiatan,
                'ket'=>$request->ket,
                'foto'=>$fileName,
                'petugas_id'=>$request->petugas_id,
                'created_at'=>now(),
            ]);
        return redirect()->route('kegiatan.index')
                        ->with('success','Data Kegiatan Baru Berhasil Disimpan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Kegiatan::find($id);
        return view('kegiatan.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Kegiatan::find($id);
        return view('kegiatan.form_edit',compact('row'));
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
            'judul_kegiatan' => 'required|max:45',
            'tgl_kegiatan' => 'required',
            'ket' => 'nullable|string|min:10',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'petugas_id' => 'required|integer',
            'updated_at'=>now(),
        ],
        //custom pesan errornya
        [
            'judul_kegiatan.required'=>'Judul Kegiatan Wajib Diisi',
            'judul_kegiatan.max'=>'Judul Kegiatan Maksimal 45 karakter',
            'tgl_kegiatan.required'=>'Tanggal Kegiatan Wajib Diisi',
            'ket.min'=>'keterangan Minimal 10 Karakter ',
            'foto.image'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.mimes'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.max'=>'Ukuran Foto Maksimal 2048',
            'petugas_id.required'=>'Petugas Wajib di Isi',
            'petugas_id.integer'=>'Petugas Wajib Diisi Berupa dari Pilihan yg Tersedia',

        ]);
        //------------foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('kegiatan')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user ingin ganti foto lama-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
            //proses foto lama ganti foto baru
            $fileName = 'foto-'.$request->judul_kegiatan.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/img'),$fileName);
        }
        //------------tidak berniat ganti ganti foto lama-----------
        else{
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('kegiatan')->where('id',$id)->update(
            [
                //'kode_petugas'=>$request->kode_petugas,
                'judul_kegiatan'=>$request->judul_kegiatan,
                'tgl_kegiatan'=>$request->tgl_kegiatan,
                'ket'=>$request->ket,
                'foto'=>$fileName,
                'petugas_id'=>$request->petugas_id,
                'updated_at'=>now(),
            ]);
        return redirect('/kegiatan'.'/'.$id)
                        ->with('success','Data Kegiatan Berhasil Diubah');
        
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
        $row = Kegiatan::find($id);
        if(!empty($row->foto)) unlink(base_path('public/admin/img/'.$row->foto));
        //setelah itu baru hapus data pegawai
        Kegiatan::where('id',$id)->delete();
        return redirect()->route('kegiatan.index')
                        ->with('success','Data Kegiatan Berhasil Dihapus');
    }
}