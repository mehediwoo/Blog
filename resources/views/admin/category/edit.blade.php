@extends('admin.layout.app')

@section('title','Create Category')

@section('content')
{{-- Breadcramb --}}
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Category </h1>
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
                    <h3 class="card-title">Update Category</h3>
                    <a href="{{url('/categoris')}}" class="btn btn-primary">Back to Create Categori</a>
                  </div>
                </div>
                <!-- /.card-header -->

                <form action="{{url('/categoris/'.$cat->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" name="categoryName" class="form-control" id="exampleInputEmail1" value="{{ $cat->name }}">
                        @error('categoryName')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Category Description</label>
                        <textarea name="description" cols="20" rows="5" placeholder="Category Description" class="form-control">{{ $cat->description }}</textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                  </form>
                <!-- /.card-body -->
              </div>
        </div>
    </div>
  </div>

@endsection
