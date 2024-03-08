@extends('layout.main')
@section('header')
    @if (Auth::guard('admin')->user())
        @include('layout.particle.adminHeader')
    @else
        @include('layout.particle.header')
    @endif
@endsection
@section('content')
<div class="userPage">
    <p>Имя: <br>{{$data->name}} </p>
    <p>Фамилия: <br>{{$data->lastname}} </p>
    <p>Email: <br>{{$data->email}} </p>
    <p>Номер телефона: <br>{{$data->phone}} </p>
    <p>Дата регистрации: <br>{{$data->created_at}} </p>
    <p>Количество постов: <br>{{$posts_count}} </p>
    <p>Количество комментариев: <br>{{$comments_count}} </p>
</div>
<div class="cardList">
    @foreach ($posts as $item)
    @include('posts.post')
    @endforeach
    @if ($data->id == Auth::id())
    <a href={{route("showFormPost")}}>Добавить запись</a>
    @endif
</div>
@endsection