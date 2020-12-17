<?php
//extends acquisisce le pagina dove incollare il suo contenuto definito nella section
//le section inviano i dati acquisiti con yield
//con blade utilizzando le graffe si riesce ad acquisire le variabili passate coi controller
?>
@extends('master')
@section('title', $post->title)
@section('content')
<header class="masthead" style="background-image: url({{url('/img/post-bg.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>{{$post->title}}</h1>
                        <span class="subheading">
                            <p class="post-meta">Posted by daam Development Soft°
                            on {{$post->created_at->format('d-m-Y')}} <br>
                            Categories:@foreach($post->categories as $category)
                                                            {{$category->name_category}}
                                                        @endforeach
                        </p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <article>
        <div class="container">
            @foreach($images as $img)
                @if($img->post_id === $post->id)
                    <div class="container-fluid">
                        <div class="row">
                            <ul class="nav">
                                <li><img src="{{$img->title}}" class="img-thumbnail row-cols-xl-6" style="width: 250px; height: 250px;" alt=""></li>
                            </ul>
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="card-body text-justify">
                    <p>{!! nl2br(e($post->content)) !!}</p>
                </div>
                <div class="clearfix"></div>
            </div>

            @foreach($comments as $comment)
                <div class="col-lg-8 col-md-10 mx-auto card mb-4">
                    <div class="card-body">
                        <blockquote>{{ $comment->content }}</blockquote>
                    </div>
                </div>
            @endforeach

            <div class="col-lg-8 col-md-10 mx-auto card">
                <div class="card-body">
                    <form method="post" action="/Laravel/blog/public/comments">

                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach

                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="post_type" value="App\Models\Post">
                        <div class="form-group">
                            <legend>Comment</legend>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <a href="#" type="reset" class="btn btn-warning">Cancel</a>
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>
@endsection
