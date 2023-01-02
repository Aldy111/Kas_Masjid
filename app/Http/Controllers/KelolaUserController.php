<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelolaUser;
use Illuminate\Support\Facades\Hash;
use DB;
Use Alert;



class KelolaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $kelola_user = KelolaUser::orderBy('id', 'DESC')->get();
        return view('kelola_user.index',compact('kelola_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_isactive = [1,0];
        $ar_role = ['admin','petugas','anggota'];
        //arahkan ke form input data
        return view('kelola_user.form',compact('ar_isactive','ar_role'));
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
            'name' => 'required|max:45',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=> 'min:6',
            'role' => 'required',
            'isactive' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ],
        //custom pesan errornya
        [
            'name.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Nama Maksimal 45 karakter',
            'email.required'=>'Email Wajib di Isi',
            'email.email'=>'Email Harus Berupa Email',
            'email.unique'=>'Email Sudah Ada(Tidak Boleh Terduplikasi)',
            'role.required'=>'Role Wajib Diisi',
            'isactive.required'=>'Isactive Wajib Diisi',
            'password.min'=>'Password Minimal 6 Karakter',
            'password.required_with' =>'Password wajib di Isi',
            'password.same'=>'Password harus sama dengan Confirmed password ',
            'password_confirmation.min'=>'Password Minimal 6 Karakter',
            'foto.image'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.mimes'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.max'=>'Ukuran Foto Maksimal 2048',

        ]
    );
        //Petugas::create($request->all());
        //------------apakah user  ingin upload foto-----------
        if(!empty($request->foto)){
            $fileName = 'foto-'.$request->name.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('user/'),$fileName);
        }
        else{
            $fileName = '';
        }
        //lakukan insert data dari request form
        DB::table('users')->insert(
            [
                
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role,
                'isactive'=>$request->isactive,
                'foto'=>$fileName,
                'created_at'=>now(),
            ]);
        return redirect()->route('kelola_user.index')
                        ->with('success','Data User Baru Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = KelolaUser::find($id);
        return view('kelola_user.form_edit',compact('row'));
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
            'name' => 'required|max:45',
            //'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'isactive' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'updated_at'=>now(),
        ],
        [
            'name.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Nama Maksimal 45 karakter',
            'role.required'=>'Role Wajib Diisi',
            'isactive.required'=>'Isactive Wajib Diisi',
            'foto.image'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.mimes'=>'Extensi Foto Harus jpg,png,jpeg,gif,svg',
            'foto.max'=>'Ukuran Foto Maksimal 2048',
        ]
    );
        //------------foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('users')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user ingin ganti foto lama-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($row->foto)) unlink('user/'.$row->foto);
            //proses foto lama ganti foto baru
            $fileName = 'foto-'.$request->name.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('user/'),$fileName);
        }
        //------------tidak berniat ganti ganti foto lama-----------
        else{
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('users')->where('id',$id)->update(
            [
                'name'=>$request->name,
                // 'email'=>$request->email,
                // 'password'=>Hash::make($request->password),
                'role'=>$request->role,
                'isactive'=>$request->isactive,
                'foto'=>$fileName,
                'updated_at'=>now(),
            ]);
        return redirect()->route('kelola_user.index')
                        ->with('success','Data User Berhasil Diubah');
        
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
        $row = KelolaUser::find($id);
        if(!empty($row->foto)) unlink(base_path('public/user/'.$row->foto));
        //setelah itu baru hapus data pegawai
        KelolaUser::where('id',$id)->delete();
        return redirect()->route('kelola_user.index')
                        ->with('success','Data User Berhasil Dihapus');
    }
}