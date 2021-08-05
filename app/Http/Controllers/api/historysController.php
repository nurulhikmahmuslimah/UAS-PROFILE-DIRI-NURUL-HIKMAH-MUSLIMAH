<?php

namespace App\Http\Controllers\Api;

use App\Models\historys;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class historysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historys = historys::orderBy('id','desc')->paginate(3);

        return response()->json([
            'success'=> true,
            'message'=> 'Daftar data Katalog',
            'data'=> $historys
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
            'history' => 'required|unique:historys$historys|max:255',
            
        ]);

        $historys = historys::create([
            'history' => $request->history
           
           
        ]);
        if($historys)
        {
            return response()->json([
                'success' => true,
                'message' => 'Pengisian berhasil di tambahkan',
                'data' => $historys
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Pengisian gagal di tambahkan',
                'data' => $historys
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
        $history = historys::where('id', $id)->first();
        
        return response()->json([
            'success' => true,
            'message' => 'Detail Ruangan',
            'data'    => $history
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
            'history' => 'required|unique:historys$historys|max:255',
           
        ]);

        $p = historys::find($id)->update([
            'history' => $request->history
           
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $history
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
        $cek = historys::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
