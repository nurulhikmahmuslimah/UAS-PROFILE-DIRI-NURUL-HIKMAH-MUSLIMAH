<?php

namespace App\Http\Controllers;
use App\Models\pengalamans;
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
        $pengalamans = pengalamans::orderBy('id','desc')->paginate(2);
        return view('pengalamans.index', compact('pengalamans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengalamans.create');
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
            'pengalaman' => 'required|unique:pengalamans|max:255',
           
        ]);

        $pengalamans = new pengalamans;

        $pengalamans->pengalaman = $request->pengalaman;
      
       
        $pengalamans->save();
        return redirect('/pengalamans');
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
        return view('pengalamans.show' ,['pengalaman' => $pengalaman]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengalaman = pengalamans::where('id', $id)->first();
        return view('pengalamans.edit' , ['pengalaman' => $pengalaman]);
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
            'pengalaman' => 'required|unique:pengalamans|max:255',
           
        ]);
            pengalamans::find($id)->update([
                'pengalaman' => $request->pengalaman
                
            ]);
            
            return redirect('/pengalamans');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pengalamans::find($id)->delete();
        return redirect('/pengalamans');
    }
    public function addmember($id)
    {
        $nama = namas::where('pengalamans_id', '=', 0)->get(); 
        $pengalaman = pengalamans::where('id', $id)->first();
        return view('pengalamans.addmember' ,['pengalaman' => $pengalaman, 'nama' => $nama]);
    }
    public function updateaddmember(Request $request, $id)
    {
        $nama = namas::where('id', $request->folder_id)->first(); 
        namas::find($nama->id)->update([
                'pengalamans_id' => $id
               
            ]);
            
            return redirect('/pengalamans/addmember/' . $id);
        }
        public function deleteaddmember(Request $request, $id)
        {
            //dd($id);
            namas::find($id)->update([
                    'pengalamans_id' => 0
                   
                ]);
                
                return redirect('/pengalamans');
            }
}
