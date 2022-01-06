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
              <form method="post" action="{{ url('katagoris', $post->id ) }}">
              @csrf
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                  <label for="inputStatus">Jenis Kelamin</label>
                        <select id="inputStatus" class="form-control custom-select" name="namakatagori">
                            <option selected disabled value="{{ $post->namakatagori }}">{{ $post->namakatagori }}</option>
                            <option>offline class</option>
                            <option>webinar</option>
                            <option>online self</option>
                            <option>learning</option>
                </select>
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