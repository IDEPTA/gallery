@extends('layout.main')
@section('content')
    <form method="POST" class="addPostForm" action={{ route('editPost', ['post_id' => $data['id']]) }}
        enctype="multipart/form-data">
        @csrf
        <input type="file" name="img">
        @error('img')
            {{ $message }}
        @enderror
        <input type="text" name="title" placeholder="Заголовок" value="{{ $data['title'] }}">
        @error('title')
            {{ $message }}
        @enderror
        <textarea type="text" name="description" placeholder="Описание">{{ $data['description'] }}</textarea>
        @error('description')
            {{ $message }}
        @enderror
        <textarea type="text" name="text" placeholder="Текст">{{ $data['text'] }}</textarea>
        @error('text')
            {{ $message }}
        @enderror
        <button type="submit">Отправить</button>
    </form>
@endsection
