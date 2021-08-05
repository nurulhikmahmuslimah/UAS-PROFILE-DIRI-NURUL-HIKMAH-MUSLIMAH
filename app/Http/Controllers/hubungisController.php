<?php

namespace App\Http\Controllers;
use App\Models\hubungis;
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
        $hubungis = hubungis::orderBy('id','desc')->paginate(2);
        return view('hubungis.index', compact('hubungis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hubungis.create');
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
            'no_tlp' => 'required|unique:hubungis|max:255',
           
        ]);

        $hubungis = new hubungis;

        $hubungis->no_tlp = $request->no_tlp;
       
       
        $hubungis->save();
        return redirect('/hubungis');
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
        return view('hubungis.show' ,['hubungi' => $hubungi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hubungi = hubungis::where('id', $id)->first();
        return view('hubungis.edit' , ['hubungi' => $hubungi]);
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
            'no_tlp' => 'required|unique:hubungis|max:255',
          
        ]);
            hubungis::find($id)->update([
                'no_tlp' => $request->no_tlp
               
            ]);
            
            return redirect('/hubungis');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        hubungis::find($id)->delete();
        return redirect('/hubungis');
    }
}
