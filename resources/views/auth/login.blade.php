@extends('layout.plantilla')

@section('title','Iniciar Sesion')
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var showPasswordCheckbox = document.getElementById("mostrarClave");

        if (showPasswordCheckbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
<link rel="stylesheet" href="{{asset('css/log.css')}}">
@section('contenido')
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-3 h-100"> <!-- Redujimos el padding vertical de py-5 a py-3 -->
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-4 mx-md-4"> <!-- Redujimos el padding vertical de p-md-5 a p-md-4 -->

                                <div class="text-center">
                                    <img src="{{ asset('img/Cupula.png') }}"
                                        style="width: 100%;" alt="logo">
                                    <h4 class="mt-2 mb-3 pb-1">Nosotros somos La Cúpula Gourmet</h4> <!-- Redujimos el margin bottom de mb-5 a mb-3 -->
                                </div>

                                {{-- ----------------------------------------- --}}
                                {{-- ------------FORMULARIO INICIO SESION------- --}}
                                {{-- ----------------------------------------- --}}
                                <form action="/login" method="POST">
                                    @csrf
                                    <p>Ingresa a tu Cuenta para continuar</p>
                                    @include('layout.messages')
                                    <div class="form-floating mb-3"> <!-- Redujimos de mb-4 a mb-3 -->
                                        <input type="text" id="form2Example11" class="form-control"
                                            placeholder="email@example.com//userName" name="username" />
                                        <label class="form-label" for="form2Example11">Correo o Nombre de Usuario</label>
                                        @error('username')
                                            <br>
                                            <span>*{{$message}} </span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3"> <!-- Redujimos de mb-4 a mb-3-->
                                        <input type="password" id="password" class="form-control"
                                        placeholder="contraseña"
                                         name="password" />
                                        <label class="form-label" for="password">Contraseña</label>
                                        @error('password')
                                            <br>
                                            <span>*{{$message}} </span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3" id="check"> <!-- Redujimos de mb-4 a mb-3 -->
                                        <input type="checkbox" id="mostrarClave" onchange="togglePasswordVisibility()" />
                                        <label class="mb-0 me-2" id="check">Mostrar Contraseña</label>
                                    </div>

                                    <div class="text-center pt-2 mb-3 pb-1"> <!-- Redujimos de mb-5 a mb-3 y de pt-1 a pt-2 -->
                                        <input class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-2" type="submit"
                                            value="Iniciar Sesión"> <!-- Redujimos de mb-3 a mb-2 -->
                                        <a class="text-muted" href="#!">Olvidaste tu Contraseña?</a>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-3"> <!-- Redujimos de pb-4 a pb-3 -->
                                        <p class="mb-0 me-2">¿No tienes una Cuenta?</p>
                                        <a type="button" href="/register" class="btn btn-outline-danger">Crear cuenta</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-3 p-md-4 mx-md-4"> <!-- Redujimos el padding vertical de py-4 a py-3 -->
                                <h4 class="mb-3">Somos mas que un Restaurante</h4> <!-- Redujimos el margin bottom de mb-4 a mb-3 -->
                                <p class="small mb-0">somos una experiencia culinaria que te invitamos a disfrutar.
                                    Cada plato que servimos es una expresión de nuestro amor por la gastronomía y un esfuerzo
                                    constante por brindarte lo mejor. Desde el momento en que cruzas nuestras puertas,
                                    nos esforzamos por ofrecerte un ambiente elegante y acogedor, acompañado
                                    de un servicio excepcional.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
