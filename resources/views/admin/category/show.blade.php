@extends('admin.layout.app')

@section('title','All Category')

@section('content')
{{-- Breadcramb --}}
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Category</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                  <div class="d-flex justify-content-between text-items-center" >
                    <h3 class="card-title">Show Category</h3>
                    <a href="{{url('/categoris/create')}}" class="btn btn-primary">Create Categori</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 10%">Name</th>
                        <th style="width: 10%">Slug</th>
                        <th style="width: 60%">Description</th>
                        <th style="width: 2%">Action</th>
                        <th style="width: 3%"></th>
                      </tr>
                    </thead>



                    <tbody>
                        @foreach ($catData as $x => $catData)
                      <tr>
                        <td>{{ $x+1 }}</td>
                        <td>{{ $catData->name }}</td>
                        <td>{{ $catData->slug }}</td>
                        <td>
                            {{ $catData->description }}
                        </td>
                        <td>
                            <a href="{{ url('categoris/' .$catData->id . '/edit') }}" class="btn btn-sm btn-warning mr-1"><i class="fas fa-edit"></i></a>

                            {{-- <a href="{{url('categoris/'.$catData->id)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-eye"></i></a> --}}
                        </td>
                        <td>
                            <form action="{{url('categoris/'.$catData->id)}}" method="POST" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
    </div>
  </div>

@endsection
