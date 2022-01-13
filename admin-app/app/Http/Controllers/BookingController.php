<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Pelatihan;
use App\Models\Peserta;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Booking::with('peserta','pelatihan')->latest()->paginate();
        return view('booking.booking',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pes = Peserta::all();
        $pel = Pelatihan::all();
        return view('booking.create_booking',compact('pes','pel'));
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
            'id_peserta' => 'required',
            'id_pelatihan' => 'required',
            'tglbooking' => 'required',
        ]);
        $input = $request -> all();
        $post = Booking::create($input);
        if($post){
            return redirect()->route('bookings.index')->with('success',' Booking baru berhasil dibuat.');
        }else{
            return back()->with('error',' Booking baru gagal dibuat.');
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
        $pes = Peserta::all();
        $pel = Pelatihan::all();
        $post = Booking::with('peserta','pelatihan')->findOrFail($id);
        return view('booking.view_booking',compact('pes','pel','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pes = Peserta::all();
        $pel = Pelatihan::all();
        $post = Booking::with('peserta','pelatihan')->findOrFail($id);
        return view('booking.edit_booking',compact('pes','pel','post'));
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
            'id_peserta' => 'required',
            'id_pelatihan' => 'required',
            'tglbooking' => 'required',
        ]);
        $post = Booking::find($id)->update($request->all());

        if($post){
            return redirect()->route('bookings.index')->with('success',' Booking berhasil diupdate.');
        }else{
            return back()->with('error',' Booking gagal diupdate.');
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
        $post = Booking::find($id);
        $post -> delete();
        return back()->with('success','Booking berhasil didelete');
    }
}
