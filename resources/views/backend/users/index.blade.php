@extends('master')
@section('title','Utenti')
@section('content')
<header class="masthead" style="background-image: url({{url('img/about-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Lista utenti</h1>
                        <span class="subheading">Utenti registrati.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="float-left">All users</h5>
                <div class="clearfix"></div>
            </div>
            <div class="content">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($users->isEmpty())
                    <p> There is no user.</p>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Joined at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a href="{{action('App\Http\Controllers\Admin\UsersController@edit',$user->id)}}">{{ $user->name }} </a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                                    <td>{{ $user->created_at }}</td>
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
