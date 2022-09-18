@extends('admin.layout.app')

@section('title','Edit Post')

@section('content')
{{-- Breadcramb --}}
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add a New Post</h1>
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
                    <h3 class="card-title">Add New Post</h3>
                    <a href="{{url('/post')}}" class="btn btn-primary">Back to all Posts</a>
                  </div>
                </div>
                <!-- /.card-header -->

                <form action="{{url('/post/'.$edit->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Post Title</label>
                        <input type="text" name="postTitle" class="form-control" value="{{ $edit->title }}" placeholder="Post Title">
                        @error('postTitle')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="">Category: <span class="text-success">{{ $edit->cate_name }}</span></label> <br>
                        <label for="exampleInputEmail1">Post Category</label>
                        <select name="postCategory" class="form-control" value="{{ old('postCategory') }}">
                            <option value="" selected style="display:none">Select Category</option>
                            @foreach ($cates as $c)
                            <option value="{{ $c->name }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                      </div>
                      {{-- Cover Photo --}}
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="postCoverPhoto" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Post Cover Photo</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                      <div class="input-group mt-2">
                        <img src="{{ asset($edit->image) }}" alt="" height="70px" width="130px">
                      </div>
                      @error('postCoverPhoto')
                        <p style="color: red">{{ $message }}</p>
                      @enderror

                      <div class="form-group">
                        <label for="exampleInputPassword1">Post Description</label>
                        <textarea name="description" cols="20" rows="5" placeholder="Post Description" class="form-control">{{ $edit->description }}</textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update Post</button>
                    </div>
                  </form>
                <!-- /.card-body -->
              </div>
        </div>
    </div>
  </div>

@endsection
