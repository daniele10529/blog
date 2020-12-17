@extends('master')
@section('title','Dashboard')
@section('content')

<header class="masthead" style="background-image: url({{url('img/dashboard.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Pannello di Controllo</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container" style="background-color: #2d3748">
        <div class="row banner">

            <div class="col-md-12 mt-5">

                <div class="list-group"  style="background-color: #2d3748">
                    <div class="list-group-item"  style="background-color: #2d3748; color: mediumseagreen;">
                        <div class="row-content">
                            <h5><i class="far fa-grin-tongue mb-3"></i> Manage User</h5>
                            <a href="/Laravel/blog/public/admin/user" class="btn btn-warning">All Users</a>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                    <div class="list-group-item"  style="background-color: #2d3748; color: mediumseagreen;">
                        <div class="row-content">
                            <h5><i class="fa fa-users mb-3"></i> Manage Roles</h5>
                            <a href="/Laravel/blog/public/admin/roles" class="btn btn-info">All Roles</a>
                            <a href="/Laravel/blog/public/admin/roles/create" class="btn btn-success">Create A Role</a>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                    <div class="list-group-item"  style="background-color: #2d3748; color: mediumseagreen;">
                        <div class="row-content">
                            <h5><i class="fas fa-file-signature mb-3"></i> Manage Posts</h5>
                            <a href="/Laravel/blog/public/admin/posts" class="btn btn-info">All Posts</a>
                            <a href="/Laravel/blog/public/admin/posts/create" class="btn btn-success">Create A Post</a>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                    <div class="list-group-item"  style="background-color: #2d3748; color: mediumseagreen;">
                        <div class="row-content">
                            <h5><i class="fas fa-cogs mb-3"></i> Manage Catogories</h5>
                            <a href="/Laravel/blog/public/admin/categories" class="btn btn-info">All Categories</a>
                            <a href="/Laravel/blog/public/admin/categories/create" class="btn btn-success">Create A Category</a>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                </div>

            </div>

        </div>
    </div>
@endsection
