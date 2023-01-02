<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Petugas;
use App\Models\Kegiatan;
use DB;
class Kegiatan2Controller extends Controller
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
        return view('landingpage.kegiatan',compact('kegiatan'));
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
        return view('landingpage.kegiatan_detail',compact('row'));
    }

}