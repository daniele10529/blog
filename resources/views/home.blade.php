@extends('master')
@section('title','Home')
@section('content')
<header class="masthead" style="background-image: url({{url('img/home-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Daam web site</h1>
            <span class="subheading">The daam Laravel blog</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($posts as $post)
        <div class="post-preview">
          <a href="{{action('App\Http\Controllers\PagesController@show',$post->slug)}}">
            <h2 class="post-title">
              {{$post->title}}
            </h2>
            <h3 class="post-subtitle">
              {{Str::limit($post->content,100)}}
            </h3>
          </a>

            @foreach($images as $img)
                @if($img->post_id === $post->id)
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="{{$img->title}}" class="img-fluid" style="width: 50px; height: 50px;" alt="">
                        </div>
                    </div>
                @endif
            @endforeach

          <p class="post-meta">Posted by {{$post->users->name}}
            on {{$post->created_at->format('d-m-Y')}}
            Categoria : @foreach($post->categories as $category)
              {{$category->name_category}}
            @endforeach
          </p>

        </div>
        @endforeach
        <hr>
        <!-- Pager -->
        <div class="col-lg-8">

        </div>
      </div>
    </div>

  </div>

  <hr>
@endsection
