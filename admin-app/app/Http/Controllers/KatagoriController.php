<?php

namespace App\Http\Controllers;
use App\Models\Katagori;
use Illuminate\Http\Request;

class KatagoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Katagori::all();
        return view('katagori.katagori',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('katagori.create');
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
            'namakatagori' => 'required',
        ]);

        $input = $request->all();
        $post = Katagori::create($input);

        if($post){
            return redirect()->route('katagoris.index')->with('success',' Katagori baru berhasil dibuat.');
        }else{
            return back()->with('error',' Katagori baru gagal dibuat.');
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
        $post = Katagori::findOrFail($id);
        return view('katagori.edit_katagori',[
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
            'namakatagori' => 'required',
        ]);
        $post = Katagori::find($id)->update($request->all());

        if($post){
            return redirect()->route('katagoris.index')->with('success',' Katagori berhasil diupdate.');
        }else{
            return back()->with('error',' Katagori gagal diupdate.');
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
        $post = Katagori::find($id);
        $post -> delete();
        return back()->with('success','Katagori berhasil didelete');
    }
}
