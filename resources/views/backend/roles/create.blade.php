@extends('master')
@section('title','Roles')
@section('content')
<header class="masthead" style="background-image: url({{url('img/about-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Manager roles</h1>
                        <span class="subheading">Gestisci il ruolo utente</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header ">
                <h5 class="float-left">Create a new role</h5>
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
                        <label for="name" class="col-lg-12 control-label">Name</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a href="/Laravel/blog/public/admin/roles" type="reset" class="btn btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <div class="card mt-12">
        <a href="/Laravel/blog/public/admin/dashboard" class="btn btn-success">Torna alla dashboard</a>
    </div>

    </div>
@endsection
