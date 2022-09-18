@extends('ui.layout.app')

@section('title','Home')

@section('content')

<div class="site-section bg-light">
    <div class="container">
      <div class="row align-items-stretch retro-layout-2">
        <div class="col-md-4">
        @foreach ($first as $first)
          <a href={{ url('readmore/'.$first->id) }} class="h-entry mb-30 v-height gradient" style="background-image: url('{{ asset("$first->image") }}');">

            <div class="text">
              <h2>{{ $first->title }}</h2>
              <span class="date">{{ $first->created_at->format('M d, Y') }}</span>
            </div>
          </a>
        @endforeach
        </div>
        <div class="col-md-4">
        @foreach ($middle as $middle)
            <a href="{{ url('readmore/'.$middle->id) }}" class="h-entry img-5 h-100 gradient" style="background-image: url('{{asset("$middle->image")}}');">

                <div class="text">
                <div class="post-categories mb-3">
                    <span class="post-category bg-danger">{{ $middle->cate_name }}</span>
                </div>
                <h2>{{ $middle->title }}</h2>
                <span class="date">{{ $first->created_at->format('M d, Y') }}</span>
                </div>
            </a>
        @endforeach
        </div>

        <div class="col-md-4">
        @foreach ($third as $third)
          <a href="{{ url('readmore/'.$third->id) }}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ asset("$third->image") }}');">

            <div class="text">
              <h2>{{ $third->title }}</h2>
              <span class="date">{{ $third->created_at->format('M d, Y') }}</span>
            </div>
          </a>
          @endforeach
        </div>

      </div>
    </div>
  </div>

  {{-- Recent Posts Starts --}}

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h2>Recent Posts</h2>
        </div>
      </div>
      <div class="row">
        @foreach ($post as $recentPost)
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="{{ url('/readmore/'.$recentPost->id) }}"><img src="{{asset($recentPost->image)}}" alt="Image" class="img-fluid rounded" style="width:370px;height:247px"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3">{{ $recentPost->cate_name }}</span>

            <h2><a href="single.html">{{ $recentPost->title }}</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('ui')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">Mehedi Hasan</a></span>
              <span>&nbsp;-&nbsp; {{ $recentPost->created_at->format('M d, Y') }}</span>
            </div>

              <p>{!! Str::substr($recentPost->description,0,360) !!}</p>
              <p><a href="{{ url('/readmore/'.$recentPost->id) }}">Read More</a></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="row text-center pt-5 border-top">

        <div class="col-md-12">
            {{ $post->links() }}
          {{-- <div class="custom-pagination">
            <span>1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span>...</span>
            <a href="#">15</a>
          </div> --}}
        </div>
      </div>

    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">

      <div class="row align-items-stretch retro-layout">

        <div class="col-md-5 order-md-2">
            @foreach ($right as $right)
            <a href="{{ url('/readmore/'.$right->id) }}" class="hentry img-1 h-100 gradient" style="background-image: url('{{ $right->image }}');">
                <span class="post-category text-white bg-danger">{{ $right->cate_name }}</span>
                <div class="text">
                  <h2>{{ $right->title }}</h2>
                  <span>{{ $right->created_at->format('M d, Y') }}</span>
                </div>
              </a>
            @endforeach
        </div>

        <div class="col-md-7">
            @foreach ($top as $top)
            <a href="{{ url('/readmore/'.$top->id) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{ asset("$top->image") }}');">
                <span class="post-category text-white bg-success">{{ $top->cate_name }}</span>
                <div class="text text-sm">
                  <h2>{{ $top->title }}</h2>
                  <span>{{ $top->created_at->format('M d, Y') }}</span>
                </div>
              </a>
            @endforeach

          <div class="two-col d-block d-md-flex justify-content-between">

            @foreach ($bottom as $bottom)
            <a href="{{ url('/readmore/'.$bottom->id) }}" class="hentry v-height img-2 gradient" style="background-image: url('{{ asset("$bottom->image") }}');">
                <span class="post-category text-white bg-primary">{{ $bottom->cate_name }}</span>
                <div class="text text-sm">
                  <h2>{{ $bottom->title }}</h2>
                  <span>{{ $bottom->created_at->format('M d, Y') }}</span>
                </div>
              </a>
            @endforeach

          </div>

        </div>
      </div>

    </div>
  </div>

@endsection
