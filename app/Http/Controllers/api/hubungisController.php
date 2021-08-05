<?php

namespace App\Http\Controllers\Api;

use App\Models\hubungis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class hubungisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hubungis = hubungis::orderBy('id','desc')->paginate(3);

        return response()->json([
            'success'=> true,
            'message'=> 'Daftar data Katalog',
            'data'=> $hubungis
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
            'no_tlp' => 'required|unique:hubungis$hubungis|max:255',
            
        ]);

        $hubungis = hubungis::create([
            'no_tlp' => $request->no_tlp,
           
           
        ]);
        if($hubungis)
        {
            return response()->json([
                'success' => true,
                'message' => 'Pengisian berhasil di tambahkan',
                'data' => $hubungis
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Pengisian gagal di tambahkan',
                'data' => $hubungis
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
        $hubungi = hubungis::where('id', $id)->first();
        
        return response()->json([
            'success' => true,
            'message' => 'Detail Ruangan',
            'data'    => $hubungi
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
            'no_tlp' => 'required|unique:hubungis$hubungis|max:255',
          
        ]);

        $p = hubungis::find($id)->update([
            'no_tlp' => $request->no_tlp
           
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $hubungi
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
        $cek = hubungis::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
