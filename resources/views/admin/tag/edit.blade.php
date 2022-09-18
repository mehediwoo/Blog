@extends('admin.layout.app')

@section('title','Update Tag Name')

@section('content')
{{-- Breadcramb --}}
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Tag Name</h1>
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
                    <h3 class="card-title">Edit Tag</h3>
                    <a href="{{url('/tag')}}" class="btn btn-primary">Back to tag list</a>
                  </div>
                </div>
                <!-- /.card-header -->

                <form action="{{url('/tag/'.$edit->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Edit Tag Name</label>
                        <input type="text" name="tagName" class="form-control" id="exampleInputEmail1" value="{{ $edit->name }}">
                        @error('tagName')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tag Description</label>
                        <textarea name="description" cols="20" rows="5" placeholder="Category Description" class="form-control">{{ $edit->desc }}</textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update Tag</button>
                    </div>
                  </form>
                <!-- /.card-body -->
              </div>
        </div>
    </div>
  </div>

@endsection
