<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Города</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
           
        </nav>
    </header>

    <main>
        <h2>Список городов</h2>
        <ul>
            @foreach($cities as $city)
                <li>
                    <a href="{{ route('city.show', $city->slug) }}">
                        {{ $city->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </main>
</body>
</html>