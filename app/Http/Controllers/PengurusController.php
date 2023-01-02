<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Petugas;
use App\Models\Jabatan;
use DB;



class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $petugas = Petugas::orderBy('id', 'ASC')->get();
        return view('landingpage.pengurus',compact('petugas'));
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
        return view('landingpage.detail_pengurus',compact('row'));
    }


}