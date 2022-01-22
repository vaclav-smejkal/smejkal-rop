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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/0b5ce08098.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}" />
    <title>@yield("title")</title>
</head>

<body class="d-flex flex-column">
    <nav class="navbar navbar-expand-sm">
        <div class="container d-flex">
            <ul class="navbar-nav d-flex flex-fill justify-content-between align-items-center">
                <li class="nav-item d-flex align-items-center position-relative">
                    <a class="nav-link" href="#"><img
                            src="https://inesan.eu/wp-content/uploads/2020/10/logo_Inesan-bile-260x65-1.png"></a>
                    <h3 class="open-tab-title text-white mx-5 mb-0">Nástěnka</h3>
                </li>
                <div class="d-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white admin" href="#">Admin<i
                                class="fas fa-users-cog fa-lg mx-3"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white logout" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Odhlásit
                            <i class="fas fa-sign-out-alt fa-lg mx-3"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </div>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-sm justify-content-center bg-white sticky-top shadow p-2 mb-2 bg-white">
        <ul class="navbar-nav navigation">
            <li class="nav-item mx-4">
                <a class="nav-link" href="#">Nástěnka<i class="fas fa-home mx-2"></i></a>
            </li>
            <li class="nav-item mx-4">
                <a class="nav-link" href="#">Uživatelé<i class="fas fa-users mx-2"></i></a>
            </li>
            <li class="nav-item mx-4">
                <a class="nav-link" href="#">Link 3</a>
            </li>
            <li class="nav-item mx-4">
                <a class="nav-link" href="#">Link 4</a>
            </li>
            <li class="nav-item mx-4">
                <a class="nav-link" href="#">Link 5</a>
            </li>
        </ul>
    </nav>
    @yield("content")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>
