@extends('layout.plantilla')

@section('title','Registrarse')
<script>
    function togglePasswordVisibility() {
    var passwordInputs = document.querySelectorAll(".toggle-password");
    var showPasswordCheckbox = document.getElementById("mostrarClave");

    if (showPasswordCheckbox.checked) {
        passwordInputs.forEach(function(input) {
            input.type = "text";
        });
    } else {
        passwordInputs.forEach(function(input) {
            input.type = "password";
        });
    }
}
</script>
<script>
    function formatPhoneNumber(input) {
    // Elimina todos los caracteres no numéricos y guiones medios duplicados
    var phoneNumber = input.value.replace(/[^\d-]/g, '').replace(/-+/g, '-');

    // Asegúrate de que no haya más de 8 dígitos (incluyendo el guión)
    if (phoneNumber.length > 9) {
        phoneNumber = phoneNumber.substr(0, 9);
    }

    // Inserta un guión medio después del cuarto dígito si hay exactamente 4 dígitos
    if (phoneNumber.length === 4 && phoneNumber.charAt(4) !== '-') {
        phoneNumber = phoneNumber.substr(0, 4) + '-' + phoneNumber.substr(4);
    }

    // Inserta un guión medio después del cuarto dígito nuevamente si llegamos a 8 dígitos
    if (phoneNumber.length === 8) {
        phoneNumber = phoneNumber.substr(0, 4) + '-' + phoneNumber.substr(4);
    }

    // Establece el valor formateado de nuevo en el campo de entrada
    input.value = phoneNumber;

    // Asegura que se pueda borrar el guión medio con "Backspace"
    input.onkeydown = function(e) {
        if (e.keyCode === 8) {
            if (phoneNumber.charAt(4) === '-') {
                input.value = phoneNumber.substring(0, 4) + phoneNumber.substring(5);
            }
        }
    };
}

</script>
<link rel="stylesheet" href="{{asset('css/reg.css')}}">
@section('contenido')
<div class="form-bg" bis_skin_checked="1">
    <div class="container" bis_skin_checked="1">
        <div class="row align-items-center justify-content-center" bis_skin_checked="1">
            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8" bis_skin_checked="1">
                <div class="form-container" bis_skin_checked="1">
                    <h3 class="title">Crea una Cuenta</h3>
                    {{-- ----------------------------------------------¡ --}}
                    {{-- ------------FORMULARIO CREATE ------------------- --}}
                    {{-- ---------------------------------------------- --}}
                    @include('layout.messages')
                    <form class="form-horizontal" method="post" action="/register">
                        @csrf
                        <div class="form-group" bis_skin_checked="1">
                            <label>Nombre de Usuario*</label>
                            <input class="form-control" type="text" name="username">
                            @error('username')
                            <br>
                            <span>*{{$message}}</span>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group" bis_skin_checked="1">
                            <label>Correo Electronico*</label>
                            <input class="form-control" type="email" placeholder="email@example.com" name="email">
                            @error('email')
                            <br>
                            <span>*{{$message}}</span>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group" bis_skin_checked="1">
                            <label>Contraseña*</label>
                            <input class="form-control toggle-password" type="password" name="password">
                            @error('password')
                            <br>
                            <span>*{{$message}}</span>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group" bis_skin_checked="1">
                            <label>Confirmar Contraseña*</label>
                            <input class="form-control toggle-password" type="password"  name="password_confirmation">
                            @error('password_confirmation')
                            <br>
                            <span>*{{$message}}</span>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group" id="check" bis_skin_checked="1">
                            <label>Mostrar Contraseña</label>&nbsp;
                            <input type="checkbox" id="mostrarClave" onchange="togglePasswordVisibility()">
                        </div>
                        {{-- ---------------------------------------------- --}}
                        <h4 class="sub-title">Informacio Personal</h4>
                        {{-- ---------------------------------------------- --}}
                        <div class="form-group" bis_skin_checked="1">
                            <label>Nombres*</label>
                            <input class="form-control" type="text" name="name">
                            @error('name')
                            <br>
                            <span>*{{$message}}</span>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group" bis_skin_checked="1">
                            <label>Apellidos*</label>
                            <input class="form-control" type="text" name="lastname">
                            @error('lastname')
                            <br>
                            <span>*{{$message}}</span>
                            <br>
                            @enderror
                        </div>
                        {{-- ----------------------------------------------- --}}
                        <div class="form-group phone-no" bis_skin_checked="1">
                            <label>Telefono*</label>
                            <input class="form-control" type="text" name="telephone" id="telefono" oninput="formatPhoneNumber(this)">
                            @error('telephone')
                            <br>
                            <span>*{{$message}}</span>
                            <br>
                            @enderror
                        </div>
                        <input type="hidden" name="id_rol" value="2">
                        {{-- /////////////////////////////////////////////////////// --}}
                        <input type="submit" class="btn signin" value="Crear Cuenta">
                        <span class="user-login">Ya tienes una Cuenta? Click aqui <a href="/login">Iniciar Sesion</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection