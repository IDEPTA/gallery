@extends('layout.main')
@section('header')
    @if (Auth::guard('admin')->user())
        @include('layout.particle.adminHeader')
    @endif
@endsection
@section('content')
    @include('admin.users')
@endsection