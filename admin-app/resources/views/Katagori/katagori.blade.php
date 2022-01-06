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
          <a href="{{ url('katagoris/create') }}"><button  type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i>Tambah Katagori</button></a>
          </div>
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
   
<div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Katagori</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $post)
                    <tr>
                      <td>{{ $post -> id }}</td>
                      <td>{{ $post -> namakatagori }}</td>
                      <td>
                      <a class="btn btn-info btn-sm" href="{{ route('katagoris.edit', $post->id ) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                      </td>
                      <td>
                      <form method="POST" action="{{ url('katagoris', $post->id ) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                          </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nama Katagori</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
@endsection