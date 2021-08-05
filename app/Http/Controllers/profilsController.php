<?php

namespace App\Http\Controllers;
use App\Models\profils;
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
        $profils = profils::orderBy('id','desc')->paginate(2);
        return view('profils.index', compact('profils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profils.create');
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
            'nama' => 'required|unique:profils|max:255',
            'ttl' => 'required',
            'alamat' => 'required',
        ]);

        $profils = new profils;

        $profils->nama = $request->nama;
        $profils->ttl = $request->ttl;
        $profils->alamat = $request->alamat;
       
        $profils->save();
        return redirect('/profils');
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
        return view('profils.show' ,['profil' => $profil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = profils::where('id', $id)->first();
        return view('profils.edit' , ['profil' => $profil]);
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
            'nama' => 'required|unique:profils|max:255',
            'ttl' => 'required',
            'alamat' => 'required',
        ]);
            profils::find($id)->update([
                'nama' => $request->nama,
                'ttl' => $request->ttl,
                'alamat' => $request->alamat
            ]);
            
            return redirect('/profils');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        profils::find($id)->delete();
        return redirect('/profils');
    }
}
