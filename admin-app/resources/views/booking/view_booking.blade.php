@extends('layouts.app')
@section('content')

@if (session('success'))
  <div class="alert-success">
    <p>{{ session('success') }}</p>
  </div>
  @endif
  
  @if ($errors->any())
  <div class="alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Booking</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ url('bookings', $post->id ) }}">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="inputStatus">Nama Peserta </label>
                  <p value="{{ $post->id_peserta }}">{{ $post->peserta->namapeserta }}</p>
                       
                  </div>
                  <div class="form-group">
                  <label for="inputStatus">Nama Pelatihan </label>
                  <p value="{{ $post->id_pelatihan }}">{{ $post->pelatihan->namapelatihan }}</p>
                       
                  </div>
                  <div class="form-group">
                  <label>Tanggal Booking</label>
                  <p>{{ $post->tglbooking }}</p>
                  <!-- /.input group -->
                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div> -->
              </form>
            </div>
            <!-- /.card -->
            @endsection