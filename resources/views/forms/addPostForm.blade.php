@extends('layout.main')
@section('content')
    <form method="POST" class="addPostForm" action="createPost" enctype="multipart/form-data">
        @csrf
        <input type="file" name="img">
        @error('img')
            {{ $message }}
        @enderror
        <input type="text" name="title" placeholder="Заголовок">
        @error('title')
            {{ $message }}
        @enderror
        <textarea type="text" name="description" placeholder="Описание"></textarea>
        @error('description')
            {{ $message }}
        @enderror
        <textarea type="text" name="text" placeholder="Текст"></textarea>
        @error('text')
            {{ $message }}
            
        @enderror
        <button type="submit">Отправить</button>
    </form>
@endsection
