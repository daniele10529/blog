@extends('master')
@section('title','Posts')
@section('content')
<header class="masthead" style="background-image: url({{url('img/dashboard.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Visualizza i tuoi posts</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="float-left">All posts</h5>
                <div class="clearfix"></div>
            </div>
            <div class="content">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($posts->isEmpty())
                    <p> There is no post.</p>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>
                                        <a href="{{action('App\Http\Controllers\Admin\Posts\PostsController@edit',$post->id)}}">{{ $post->title }} </a>
                                    </td>
                                    <td>{{ $post->slug }}</td>
                                    <td>
                                        @foreach($post->categories as $category)
                                            {{$category->name_category}}
                                        @endforeach
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>
                                        <a href="{{action('App\Http\Controllers\Admin\Posts\PostsController@destroy',$post->id)}}" onclick="return confirm('Sei sicuro di voler eliminare il post : {{$post->title}} ?')">
                                          <i class="fas fa-trash-alt" style="color: orangered;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{action('App\Http\Controllers\Admin\ImageUploadController@index', $post->id)}}">
                                            <i class="fa fa-file-image"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
				</div>
        </div>

    </div>
@endsection
