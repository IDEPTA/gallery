@extends('layout.main')
@section('header')
    @if (Auth::guard('admin')->user())
        @include('layout.particle.adminHeader')
    @else
        @include('layout.particle.header')
    @endif
@endsection
@section('content')
    <div class="moreinfoCard">
        <a href={{ asset('storage/img/' . $data->img) }} target="_blank"><img src={{ asset('storage/img/' . $data->img) }}
                alt="картинка"></a>
        <h2>{{ $data->title }}</h2>
        <p>{{ $data->text }}</p>
        <p>Опубликовано: {{ $data->created_at }} </p>
        @if ($data->user->id == Auth::id() || Auth::guard('admin')->user())
            <p>
                <a href={{ route('editform', ['post_id' => $data->id]) }}>Изменить</a>
            </p>
        @endif
        <span class="cardsLinks">
            <a href={{ route('userpage', ['id' => $data->user]) }}>Автор: {{ $data->user->email }} </a>
            <a href={{ route('addToBasket', ['id' => $data->id]) }}>Приобрести</a>
            <a href={{ route('home') }}>Назад</a>
        </span>
    </div>
    <div class="commentsBlock">
        {{-- @if (Auth::guard('web')->user())
            <form method="POST" action={{ route('create', ['id' => $data->id]) }} class="inputBlock">
                @csrf
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" type="text" placeholder="Ваш комментарий"
                    name="comment"></textarea>
                <input class="btn btn-success" type="submit" value="Отправить">
                @error('comment')
                    <p>{{ $message }}</p>
                @enderror
            </form>
        @endif --}}

        {{-- @if (isset($comments))
            @foreach ($comments as $item)
                <div class="comment">
                    <a href={{ route('userpage', ['id' => $item->user->id]) }}> {{ $item->user->email }}: </a>
                    <p>
                        <form
                        action ={{ route('editComment', [
                            'comment_id' => $item->id,
                            'post_id' => $data->id,
                        ]) }}
                         method="post" class = "commentEditForm">
                         @csrf
                            <textarea type="text" name='text' class="commentEditInput" disabled required>{{ $item->text }}</textarea>
                            <input type="submit" class='btn btn-success hiddenSubmit' value="Сохранить" hidden>
                        </form>

                        <br>Дата публикации: {{ $item->created_at }}
                    </p>

                    @if ($item->user_id == Auth::id() || Auth::guard('admin')->id())
                        <p>
                            <a
                                class="btn btn-danger"
                                href={{ route('delete', [
                                    'comment_id' => $item->id,
                                    'post_id' => $data->id,
                                ]) }}>Удалить</a>
                            <span class="btn btn-success edit">Изменить</span>
                        </p>
                    @endif
                </div>
            @endforeach
        @endif --}}
    </div>
@endsection
