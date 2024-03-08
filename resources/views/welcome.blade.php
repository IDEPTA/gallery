@extends('layout.main')
@section('header')
    @if (Auth::guard('admin')->user())
        @include('layout.particle.adminHeader')
    @else
        @include('layout.particle.header')
    @endif
@endsection
@section('content')
<div id= 'searchContainer'>
    <form action={{route('search')}} method="post" id='searchForm'>
       
        <input type="search" name="search" placeholder="Что вы ищите ?" class="search">
        <select name="sort">
            <option value="new">Снчала новые</option>
            <option value="old">Сначала старые</option>
            <option value="day">За день</option>
            <option value="month">За месяц</option>
            <option value="year">За год</option>
        </select>
        <input class="btn btn-success" type="submit" value="Найти">
    </form>
</div>

    <div class="cardList">
        @foreach ($data as $item)
            @include('posts.post')
        @endforeach
    </div>
@endsection
