<?php

namespace App\Http\Controllers\Api;

use App\Models\profils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profilsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profils = profils::orderBy('id','desc')->paginate(3);

        return response()->json([
            'success'=> true,
            'message'=> 'Daftar data Katalog',
            'data'=> $profils
        ],200);
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
            'nama' => 'required|unique:profils$profils|max:255',
            'ttl' => 'required |numeric',
            'alamat' => 'required',
        ]);

        $profils = profils::create([
            'nama_profil' => $request->nama_profil,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
           
           
        ]);
        if($profils)
        {
            return response()->json([
                'success' => true,
                'message' => 'Pengisian berhasil di tambahkan',
                'data' => $profils
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Pengisian gagal di tambahkan',
                'data' => $profils
            ],409);
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profil = profils::where('id', $id)->first();
        
        return response()->json([
            'success' => true,
            'message' => 'Detail Ruangan',
            'data'    => $profil
        ], 200);
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
            'nama_profil' => 'required|unique:profils$profils|max:255',
            'ttl' => 'required|numeric',
            'alamat' => 'required',
        ]);

        $p = profils::find($id)->update([
            'nama_profil' => $request->nama_profil,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $p
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = profils::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
