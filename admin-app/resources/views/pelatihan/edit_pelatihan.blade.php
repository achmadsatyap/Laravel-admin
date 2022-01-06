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
                <h3 class="card-title">Update Peserta</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ url('pelatihans', $post->id ) }}">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="inputStatus">Katagori </label>
                        <select id="inputStatus" class="form-control custom-select" name="id_katagori">
                            <option selected disabled value="{{ $post->id_katagori }}">{{ $post->katagori->namakatagori }}</option>
                            @foreach ($posts as $pt)
                            <option value="{{ $pt->id }}">{{ $pt->namakatagori }}</option>
                            @endforeach
                </select>
                  </div>
                <div class="form-group">
                    <label for="inputName">Nama Pelatihan</label>
                    <input type="name" class="form-control" id="inputName" placeholder="Nama Pelatihan" name="namapelatihan" value="{{ $post->namapelatihan }}">
                  </div>
                  <div class="form-group">
                  <label>Tanggal Pelatihan</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="date" name="tglpelatihan" value="{{ $post->tglpelatihan }}" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                  <div class="form-group">
                    <label for="inputAlamat">Lokasi</label>
                    <input type="alamat" class="form-control" id="inputAlamat" placeholder="Enter alamat" name="lokasipelatihan" value="{{ $post->lokasipelatihan }}">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            @endsection