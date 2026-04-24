<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-..."
      crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/about">About us</a>
                <a class="nav-link" href="/contact">Contacts</a>
                @auth
                <a class="nav-link" href="/article">Articles</a>
                <a class="nav-link" href="/article/create">Create article</a>
                @can('moderate', App\Models\Comment::class)
                    <a class="nav-link" href="{{ route('comments.moderation') }}">📝 Модерация комментариев</a>
                @endcan
                @endauth
              </div>
            </div>
            <div class="navbar-nav d-flex justify-end">
                @guest
                <li class="nav-link">
                    <a href="/auth/create">SignUp</a>
                </li>
                <li class="nav-link">
                    <a href="/auth/login">SignIn</a>
                </li>
                @endguest
                @auth
                <li class="nav-link">
                    <a href="/auth/logout">Logout</a>
                </li>
                @endauth
              </div>
          </div>
        </nav>
    </header>


    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    @include('footer')
</body>
</html>
