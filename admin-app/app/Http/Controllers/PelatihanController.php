<?php

namespace App\Http\Controllers;

use App\Models\Katagori;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Pelatihan::with('katagori')->latest()->paginate();
        return view('pelatihan.pelatihan',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Katagori::all();
        return view('pelatihan.create_pelatihan',compact('posts'));     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'id_katagori' => 'required',
            'namapelatihan' => 'required',
            'tglpelatihan' => 'required',
            'lokasipelatihan' => 'required',
        ]);
        $input = $request->all();
        $post = Pelatihan::create($input);

        if($post){
            return redirect()->route('pelatihans.index')->with('success',' Pelatihan baru berhasil dibuat.');
        }else{
            return back()->with('error',' Pelatihan baru gagal dibuat.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Katagori::all();
        $post = Pelatihan::with('katagori')->findOrFail($id);
        return view('pelatihan.edit_pelatihan',compact('post','posts'));
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
        $request -> validate([
            'id_katagori' => 'required',
            'namapelatihan' => 'required',
            'tglpelatihan' => 'required',
            'lokasipelatihan' => 'required',
        ]);
        $post = Pelatihan::find($id)->update($request->all());

        if($post){
            return redirect()->route('pelatihans.index')->with('success',' Pelatihan berhasil diupdate.');
        }else{
            return back()->with('error',' Pelatihan gagal diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Pelatihan::find($id);
        $post -> delete();
        return back()->with('success','Pelatihan berhasil didelete');
    }
}
