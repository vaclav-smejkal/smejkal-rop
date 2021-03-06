<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0b5ce08098.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}" />
    <title>@yield("title")</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/">
                            Oficiální fórum
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/posts">
                            Diskuzní fórum
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a href="/post/create">
                                Vytvořit příspěvek
                            </a>
                        </li>
                    @endauth
                </ul>
                <ul class="btn-box">
                    @auth
                        <li class="nav-item">
                            <a href="/user/{{ Auth::id() }}" class="user">
                                <div class="img">
                                    <img src="{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}">
                                </div>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                    @endauth
                    @auth
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Odhlásit se
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/login" class="btn btn-primary">
                                Přihlášení
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="btn btn-primary">
                                Registrace
                            </a>
                        </li>
                        @endif
                    </ul>

                </div>
            </div>
        </nav>
    </body>
    <main>
        @yield("content")
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    <footer id="footer">
        <div class="copyright">
            &copy; Václav Smejkal
        </div>
    </footer>




    </html>
