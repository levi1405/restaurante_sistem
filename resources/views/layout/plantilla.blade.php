<!doctype html>
<html lang="es">

<head>
  <title>@yield('title')</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
  <!-- Site Metas -->
  <title>La Cúpula Gourmet</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Site Icons -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">


  <!-- Bootstrap CSS v5.2.1 -->
  <!-- Bootstrap CSS -->
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="/public/js/bootstrap.bundle.min.js.map">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css.map')}}">

</head>
<style>
  body{
    background: url('');
  }
  .navbar, .dropdown-menu{
            background-color: rgba(0, 0, 0, 0.582); /* Fondo oscuro semitransparente */

        }
        .navbar-nav a {
          font-weight: bold;
            color: #fff; /* Color del texto */
            position: relative;
            transition: all 0.3s ease; /* Animación de 0.3 segundos */
        }
        .navbar-nav a:hover{
          color: #ff7010;
        }
        .navbar-nav a::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px; /* Grosor del subrayado */
            bottom: 0;
            left: 0;
            background-color: #ff7010;
            transform: scaleX(0); /* Inicialmente, la animación comienza sin subrayado */
            transform-origin: bottom right;
            transition: transform 0.3s ease; /* Animación de 0.3 segundos */
        }
        .navbar-nav a:hover::before {
            transform: scaleX(1); /* Al pasar el puntero, se anima el subrayado */
            transform-origin: bottom left;
        }
</style>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="/home">
        <img src="{{asset('img/Cupula.png')}}" alt=""  height="70px" >
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="/home">Inicio</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Acerca de Nosotros</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Servicios</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/login">Iniciar Sesion</a>
              </li>
          </ul>
          
      </div>
      
    <form class="d-flex">
      {{-- <input class="form-control me-3 m-1" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success m-2 " type="submit">Search</button> --}}
      {{-- -------------------------------- --}}
      @auth
        <ul class="navbar-nav me-5 mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{auth()->user()->name ?? auth()->user()->username}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout">Cerrar Sesion</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"></a>
        </li>
      </ul>  
      @endauth
      
    </form>
  </nav>
  </header>
  <main>
    
    @yield('contenido')

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js.map')}}"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script> --}}
{{-- 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"> --}}

</body>

</html>