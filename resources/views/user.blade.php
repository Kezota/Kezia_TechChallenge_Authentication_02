@extends('layouts.master')
@section('title', "User Page")

@section('content')
    <section class="container container-fluid">
        <h1>Welcome, {{ $name }}!</h1>
        <p>Only user that logged in can access this page.</p>

        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @endauth
    </section>
@endsection