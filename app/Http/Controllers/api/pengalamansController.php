<?php

namespace App\Http\Controllers\Api;

use App\Models\pengalamans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pengalamansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengalamans = pengalamans::orderBy('id','desc')->paginate(3);

        return response()->json([
            'success'=> true,
            'message'=> 'Daftar data Katalog',
            'data'=> $pengalamans
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
            'pengalaman' => 'required|unique:pengalamans$pengalamans|max:255',
           
        ]);

        $pengalamans = pengalamans::create([
            'pengalaman' => $request->pengalaman,
           
        ]);
        if($pengalamans)
        {
            return response()->json([
                'success' => true,
                'message' => 'Pengisian berhasil di tambahkan',
                'data' => $pengalamans
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Pengisian gagal di tambahkan',
                'data' => $pengalamans
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
        $pengalaman = pengalamans::where('id', $id)->first();
        
        return response()->json([
            'success' => true,
            'message' => 'Detail Ruangan',
            'data'    => $pengalaman
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
            'pengalaman' => 'required|unique:pengalamans$pengalamans|max:255',
          
        ]);

        $p = pengalamans::find($id)->update([
            'pengalaman' => $request->pengalaman,
           
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $pengalaman
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
        $cek = pengalamans::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
