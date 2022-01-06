<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Peserta::all();
        return view('peserta.peserta',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peserta.createpeserta');
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
            'namapeserta' => 'required',
            'email' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
        ]);

        $input = $request->all();
        $post = Peserta::create($input);

        if($post){
            return redirect()->route('posts.index')->with('success',' Peserta baru berhasil dibuat.');
        }else{
            return back()->with('error',' Peserta baru gagal dibuat.');
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
        $post = Peserta::findOrFail($id);
        return view('peserta.edit_peserta',[
            'post' => $post
        ]);
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
            'namapeserta' => 'required',
            'email' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
        ]);

        $post = Peserta::find($id)->update($request->all());

        if($post){
            return redirect()->route('posts.index')->with('success',' Peserta berhasil diupdate.');
        }else{
            return back()->with('error',' Peserta gagal diupdate.');
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
        $post = Peserta::find($id);
        $post -> delete();
        return back()->with('success','Peserta berhasil didelete');
        
    }
}
