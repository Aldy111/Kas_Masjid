<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Jabatan;
Use Alert;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        //$jabatan = Jabatan::all();
        $jabatan = Jabatan::orderBy('id', 'DESC')->get();
        return view('jabatan.index',compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //arahkan ke form input data
        return view('jabatan.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_jabatan' => 'required|unique:jabatan|max:5',
            'nama_jabatan' => 'required|unique:jabatan|max:45'
        ],
        //custom pesan error
        [
            'kode_jabatan.required' => 'Kode Jabatan Wajib Di Isi',
            'kode_jabatan.unique' => 'Kode Jabatan Sudah Ada (Terduplikasi)',
            'kode_jabatan.max' => 'Kode Jabatan Maksimal 5 karakter',
            'nama_jabatan.required' => 'Nama jabatan Wajib di Isi',
            'nama_jabatan.unique' => 'Nama Jabatan Sudah Ada (Terduplikasi)',
            'nama_jabatan.max' => 'Nama Jabatan Maksimal 45 karakter',
        ]
    );
    
        Jabatan::create($request->all());
    
        return redirect()->route('jabatan.index')
                        ->with('success','Jabatan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}