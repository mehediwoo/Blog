@extends('admin.layout.app')

@section('title','View Posts')

@section('content')
{{-- Breadcramb --}}
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between text-items-center" >
                <h3 class="card-title">View Posts</h3>
                <a href="{{url('/post')}}" class="btn btn-small btn-primary">All Post</a>
              </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="card text-center mt-2" style="width: 100%;">


                <img class="card-img-top" src="{{ asset($post->image) }}" alt="Card image cap" height="450px">
                <div class="card-body">
                    <h2>{{ $post->title }}</h2>
                    <p class="text-muted">{{ $post->slug }}</p>
                    <p class="text-strong">{{ $post->cate_name }}</p>
                    <p class="text-strong">Created at: {{ $post->created_at }}</p>
                    <hr>
                    <p class="card-text mt-3">{!! $post->description !!}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
  </div>

@endsection
