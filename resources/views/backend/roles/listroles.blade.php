@extends('master')
@section('title','RolesCreate')
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
            <div class="card-header">
                <h5 class="float-left">All roles</h5>
                <div class="clearfix"></div>
            </div>
            <div class="content">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($roles->isEmpty())
                    <p> There is no role.</p>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
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