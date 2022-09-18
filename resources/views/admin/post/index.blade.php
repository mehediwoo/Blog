@extends('admin.layout.app')

@section('title','All Posts')

@section('content')
{{-- Breadcramb --}}
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">All Posts</h1>
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
                    <h3 class="card-title">Show Posts</h3>
                    <a href="{{url('/post/create')}}" class="btn btn-primary">Add Post</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 10%">Title</th>
                        <th style="width: 10%">Image</th>
                        <th style="width: 10%">Category</th>
                        <th style="width: 60%">Description</th>
                        <th style="width: 10%">Author</th>
                        <th style="width: 2%">Action</th>
                        <th style="width: 3%"></th>
                      </tr>
                    </thead>



                    <tbody>
                        @foreach ($post as $x => $post)
                      <tr>
                        <td>{{ $x+1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <img src="{{ asset($post->image) }}" alt="post_cover" style="height: 50px;width:130px">
                        </td>
                        <td>{{ $post->cate_name }}</td>
                        <td>
                            {{ Str::substr($post->description, 0, 200) }}
                        </td>
                        <td>
                            <a href="{{ url('post/' .$post->id . '/edit') }}" class="btn btn-sm btn-warning mr-1"><i class="fas fa-edit"></i></a>


                        </td>
                        <td>
                            <form action="{{url('post/'.$post->id)}}" method="POST" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                        <td>
                            <a href="{{ url('post/'.$post->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-eye"></i></a>
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
