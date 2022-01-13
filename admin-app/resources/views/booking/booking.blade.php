@extends('layouts.app')
@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row mb-6">
          <div class="col-12">
          <a href="{{url('bookings/create')}}"><button  type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Booking </button></a>
          </div>
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
<div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Peserta</th>
                    <th>Nama Pelatihan</th>
                    <th>Tanggal Booking</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                    <tr>
                      <td>{{$post -> id }}</td>
                      <td>{{$post-> peserta -> namapeserta }}</td>
                      <td>{{$post-> pelatihan -> namapelatihan }}</td>
                      <td>{{$post -> tglbooking }}</td>
                      <td>
                      <a class="btn btn-info btn-sm" href="{{ route('bookings.edit', $post->id ) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-primary btn-sm" href="{{ route('bookings.show', $post->id ) }}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          </td>
                          <td>
                          <form method="POST" action="{{ url('bookings', $post->id ) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                          </form>
                          <!-- <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>    -->
                          </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nama Peserta</th>
                    <th>Nama Pelatihan</th>
                    <th>Tanggal Booking</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
@endsection