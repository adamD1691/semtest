@extends('layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div>
                <h1>Dane Użytkownika Facebook</h1>
            </div>
            <div class="list-group">
                <a class="list-group-item">
                    <h4 class="list-group-item-heading">User ID</h4>
                    <p class="list-group-item-text">{{$user['id']}}</p>
                </a>
                <a class="list-group-item">
                    <h4 class="list-group-item-heading">Username</h4>
                    <p class="list-group-item-text">{{$user['name']}}</p>
                </a>
            </div>
        </div>
    </div>
@endsection