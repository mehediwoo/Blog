@extends('admin.layout.app')

@section('title','Create Tag')

@section('content')
{{-- Breadcramb --}}
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tags</h1>
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
                    <h3 class="card-title">Show Tags</h3>
                    <a href="{{url('/tag')}}" class="btn btn-primary">Back to All Tag List</a>
                  </div>
                </div>
                <!-- /.card-header -->

                <form action="{{url('/tag')}}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tag Name</label>
                        <input type="text" name="tagName" class="form-control" id="exampleInputEmail1" placeholder="Tag Name">
                        @error('tagName')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tag Description</label>
                        <textarea name="tagDesc" cols="20" rows="5" placeholder="Tag Description" class="form-control"></textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Create Tag</button>
                    </div>
                  </form>
                <!-- /.card-body -->
              </div>
        </div>
    </div>
  </div>

@endsection
