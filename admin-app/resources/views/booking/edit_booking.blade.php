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
                <h3 class="card-title">Update Booking</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ url('bookings', $post->id ) }}">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="inputStatus">Nama Peserta </label>
                        <select id="inputStatus" class="form-control custom-select" name="id_peserta">
                            <option selected disabled value="{{ $post->id_peserta }}">{{ $post->peserta->namapeserta }}</option>
                            @foreach ($pes as $ps)
                            <option value="{{ $ps->id }}">{{ $ps->namapeserta}}</option>
                            @endforeach
                </select>
                  </div>
                  <div class="form-group">
                  <label for="inputStatus">Nama Pelatihan </label>
                        <select id="inputStatus" class="form-control custom-select" name="id_katagori">
                            <option selected disabled value="{{ $post->id_pelatihan }}">{{ $post->pelatihan->namapelatihan }}</option>
                            @foreach ($pel as $pt)
                            <option value="{{ $pt->id }}">{{ $pt->namapelatihan }}</option>
                            @endforeach
                </select>
                  </div>
                  <div class="form-group">
                  <label>Tanggal Booking</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="date" name="tglbooking" value="{{ $post->tglbooking }}" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            @endsection