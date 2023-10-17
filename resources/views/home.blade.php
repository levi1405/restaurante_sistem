@extends('layout.plantilla')

@section('title','Inicio')

@section('contenido')
<div class="bg-light p-5 rounded">
    {{-- --Lo que se muestra si esta logueado --}}
    @auth
    <h1>Dashboard</h1>
    <h2>Bienvenido {{auth()->user()->name ?? auth()->user()->username}}
    </h2>
    <p class="lead">Solo los usuarios Autenticados pueden tener Acceso a esta Sección.</p>
    <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" role="button">Explora nuestro Sitio &raquo;</a>

    <a href="/logout" class="btn btn-danger mt-3">Cerrar Sesión</a>
    @endauth


    {{-- Lo que se muestra si no esta logueado --}}
    @guest
    <h1>Homepage</h1>
    <p class="lead">Está viendo la página de inicio. Inicie sesión para ver los datos restringidos.</p>
    <a class="btn btn-lg btn-primary" href="/login" role="button">Iniciar Sesión &raquo;</a>
    @endguest
</div>
@endsection