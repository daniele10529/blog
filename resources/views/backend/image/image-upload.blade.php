@extends('master')
@section('title','Insert Image')
@section('content')
    <header class="masthead" style="background-image: url({{url('img/dashboard.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Insert Image</h1>
                        <span class="subheading">Insert Image</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">

        <div class="panel panel-primary">
            <div class="panel-heading"><h2>Inserisci la Thumbnail</h2></div>
            <div class="panel-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    <img src="images/{{ Session::get('image') }}">
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ action('App\Http\Controllers\Admin\ImageUploadController@store',$id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <a href="/Laravel/blog/public/admin/posts/create" type="reset" class="btn btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>

                    </div>
                </form>
                <hr>
                    <div class="card mt-12">
                        <a href="/Laravel/blog/public/admin/dashboard" class="btn btn-success">Torna alla dashboard</a>
                    </div>
                    <hr>
                    <div class="card mt-12">
                        <a href="/Laravel/blog/public/admin/posts" class="btn btn-info">Torna alla lista post</a>
                    </div>

            </div>
        </div>
    </div>
@endsection
