<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--css-->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title')</title>
  </head>
  <body>
    <header class="header">
        <div class="container">
            <nav id="navbar" class="navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="{{ route('home')}}" class="navbar-brand">
                        <img class="logo" src="{{ asset('img/Klzuniformescorporativos.png')}}" alt="Klz Uniformes">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('criar_evento')}}" class="nav-link">Criar Eventos</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="{{ route('painel')}}" class="nav-link">Meus Eventos</a>
                        </li>
                        <li>
                            <form action="{{ route('logout')}}" method="POST">
                                @csrf
                                <a href="{{ route('logout')}}"
                                class="nav-link"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Sair
                                </a>
                            </form>
                        </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a href="{{ route('login')}}" class="nav-link">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register')}}" class="nav-link">Cadastrar</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </header>
                @yield('conteudo')

    <footer class="footer">
        <div class="container">
            <p class="left">Todos os direitos reservados</p>
            <p class="right">Klz Uniformes &copy;</p>
            <div class="clear"></div>
        </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/scripts.js')}}"></script>

    <!--icones-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
