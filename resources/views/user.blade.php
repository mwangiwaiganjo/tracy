@extends('layouts.main')

@section('title' , 'User Page')

@section('content')
@auth
<h1>Welcome {{Auth::user()->email}}</h1>
@endauth
@endsection
