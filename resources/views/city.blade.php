<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Города</title>
</head>

<body>
    <header>
        <h1>Выбранный город: {{ $selectedCity->name }}</h1>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('city.news', ['slug' => $selectedCity->slug]) }}">Новости</a>
            <a href="{{ route('city.about', ['slug' => $selectedCity->slug]) }}">О нас</a>
        </nav>
    </header>

    <main>
        <h2>Список городов</h2>
        <ul>
            @foreach($cities as $city)
            <li>
                <a href="{{ route('city.show', $city->slug) }}">
                    {!! $selectedCity->slug === $city->slug ? "<b>" . $city->name . "</b>" : $city->name !!}
                </a>
            </li>
            @endforeach
        </ul>
    </main>
</body>

</html>