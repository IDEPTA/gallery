<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
</head>

<body>
    @isset($msg)
        <h1>{{ $msg }}</h1>
    @endisset
    @isset($data)
        <div class="basket">
            @foreach ($data as $item)
                <span>
                    <p>{{ $item->title }} {{ $item->price }}рублей</p>
                </span>
            @endforeach
            <a href={{ route('home') }}>Назад</a>
        </div>
    @endisset
</body>

</html>
