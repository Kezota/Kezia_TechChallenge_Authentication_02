@extends('layouts.master')
@section('title', "Home Page")

@section('content')
    <section class="container container-fluid">
        <h1>Home Page</h1>
        <p>Welcome to my attempt for <b>Authentication Tech Challenge</b> for AkSub RnD</p>
        <p>Created by Kezia :)</p>
        
        {{-- COMMENT: If user not logged in, display this login now, else display logout button --}}
        @guest
            <a href="/login" class="btn btn-primary">Login Now</a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @endauth
    </section>
@endsection
