<?php

namespace App\Http\Controllers;
use App\Models\historys;
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
        $historys = historys::orderBy('id','desc')->paginate(2);
        return view('historys.index', compact('historys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('historys.create');
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
            'history' => 'required|unique:historys|max:255',
           
        ]);

        $historys = new historys;

        $historys->history = $request->history;
        
       
        $historys->save();
        return redirect('/historys');
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
        return view('historys.show' ,['history' => $history]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $history = historys::where('id', $id)->first();
        return view('historys.edit' , ['history' => $history]);
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
            'history' => 'required|unique:historys|max:255',
           
        ]);
            historys::find($id)->update([
                'history' => $request->history
              
            ]);
            
            return redirect('/historys');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        historys::find($id)->delete();
        return redirect('/historys');
    }
}
