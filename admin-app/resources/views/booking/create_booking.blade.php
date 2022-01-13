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
                <h3 class="card-title">Booking Pelatihan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ url('bookings') }}">
                @csrf
                
                <div class="card-body">
                <div class="form-group">
                  <label for="inputStatus">Nama Peserta </label>
                        <select id="inputStatus" class="form-control custom-select" name="id_peserta">
                            <option selected disabled>Pilih Peserta</option>
                            @foreach ($pes as $ps)
                            <option value="{{ $ps->id }}">{{ $ps->namapeserta }}</option>
                            @endforeach
                </select>
                  </div>
                  <div class="form-group">
                  <label for="inputStatus">Nama Pelatihan </label>
                        <select id="inputStatus" class="form-control custom-select" name="id_pelatihan">
                            <option selected disabled>Pilih Pelatihan</option>
                            @foreach ($pel as $pl)
                            <option value="{{ $pl->id }}">{{ $pl->namapelatihan }}</option>
                            @endforeach
                </select>
                  </div>
                  <div class="form-group">
                  <label>Tanggal Booking</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="date" name="tglbooking" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            @endsection