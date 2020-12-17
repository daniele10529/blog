@extends('master')
@section('title','CreatePost')
@section('content')
<header class="masthead" style="background-image: url({{url('img/dashboard.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Crea i posts</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header ">
                <h5 class="float-left">Create a new post</h5>
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
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                    </div>
                </div>

                <div class="form-gruop">
                    <label for="catogories" class="col-lg-12 control-label">Categories</label>
                <div class="col-lg-12">
                    <select name="categories[]" class="form-control" id="category" multiple>
                        @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->name_category}}</option>
                        @endforeach
                    </select>
                </div>
                </div>

                <div class="form-group">
                    <label for="content" class="col-lg-12 control-label">Content</label>
                    <div class="col-lg-12">
                        <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <a href="/Laravel/blog/public/admin/posts" type="reset" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="card mt-12">
            <a href="/Laravel/blog/public/admin/dashboard" class="btn btn-success">Torna alla dashboard</a>
        </div>
        <hr>
        <div class="card mt-12">
            <a href="/Laravel/blog/public/admin/posts" class="btn btn-info">Torna alla lista post</a>
        </div>

    </div>
@endsection
