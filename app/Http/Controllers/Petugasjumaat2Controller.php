<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\PetugasJumaat;
use App\Models\Bagian;
use App\Models\Petugas;
use DB;

class Petugasjumaat2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $petugasJ = PetugasJumaat::orderBy('id', 'ASC')->get();
        return view('landingpage.petugasjumaat',compact('petugasJ'));
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
        return view('landingpage.detail_petugasjumaat',compact('row'));
    }

}