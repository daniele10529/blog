@extends('master')
@section('title','Posts')
@section('content')
<header class="masthead" style="background-image: url({{url('img/dashboard.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Modifica i tuoi posts</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header ">
                <h5 class="float-left">Edit a post</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body mt-2">
                <form method="post">

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="title" class="col-lg-12 control-label">Title</label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $post->title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-lg-12 control-label">Content</label>
                    <div class="col-lg-12">
                        <textarea class="form-control" rows="3" id="content" name="content">{{ $post->content }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="categories" class="col-lg-12 control-label">Categories</label>

                    <div class="col-lg-12">
                        <select class="form-control" id="category" name="categories[]" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"  @if(in_array($category->id, $selectedCategories))
                                selected="selected" @endif >{{ $category->name_category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <a href="/Laravel/blog/public/admin/posts" type="reset" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
             <hr>
                <div class="col-lg-12">
                    <h4>Immagine</h4>
                    @foreach($post->img as $image)
                        <img src="{{$image->title}}" alt="{{$image->slug}}" class="img-thumbnail" style="width: 120px;height: auto;">
                    @endforeach
                    <form class="form-group" action="{{ route('image.upload.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                            </div>

                            <div class="col-md-6">
                                <a href="/Laravel/blog/public/admin/posts/create" type="reset" class="btn btn-warning">Cancel</a>
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>

                        </div>
                    </form>
                </div>


            </div>
        </div>
        <div class="card mt-12">
            <a href="/Laravel/blog/public/admin/dashboard" class="btn btn-success">Torna alla dashboard</a>
        </div>

    </div>

@endsection
