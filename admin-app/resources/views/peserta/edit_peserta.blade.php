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
              <form method="post" action="{{ url('posts', $post->id ) }}">
              @csrf
              @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="inputName" placeholder="Nama" name="id" value="{{ $post->namapeserta }}">
                  </div>
                <div class="form-group">
                    <label for="inputName">Nama</label>
                    <input type="name" class="form-control" id="inputName" placeholder="Nama" name="namapeserta" value="{{ $post->namapeserta}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ $post->email }}">
                  </div>
                  <div class="form-group">
                  <label for="inputStatus">Jenis Kelamin</label>
                        <select id="inputStatus" class="form-control custom-select" name="jeniskelamin">
                            <option selected disabled value="{{ $post->jeniskelamin }}">{{ $post->jeniskelamin }}</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                </select>
                  </div>
                  <div class="form-group">
                    <label for="inputAlamat">Alamat</label>
                    <input type="alamat" class="form-control" id="inputAlamat" placeholder="Enter alamat" name="alamat" value="{{ $post->alamat }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            @endsection