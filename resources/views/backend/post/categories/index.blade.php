@extends('master')
@section('title','Categories')
@section('content')
<header class="masthead" style="background-image: url({{url('img/dashboard.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Visualizza le categorie</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="float-left">All categories</h5>
                <div class="clearfix"></div>
            </div>
            <div class="content">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($categories->isEmpty())
                <p> There is no category.</p>
            @else
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name_category }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
@endsection