<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая статья</title>
</head>
<body>
    <h1>Новая статья создана!</h1>

    <p><strong>Заголовок:</strong> {{ $article->title }}</p>
    <p><strong>Краткое описание:</strong> {{ $article->shortDesc }}</p>
    <p><strong>Дата публикации:</strong> {{ $article->datePublic }}</p>
    <p><strong>Полное описание:</strong> {{ $article->desc }}</p>

    <hr>
    <p>
        <a href="{{ url('/article/' . $article->id) }}">Перейти к статье</a>
    </p>
</body>
</html>
