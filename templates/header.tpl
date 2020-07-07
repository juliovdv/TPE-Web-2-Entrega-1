<!DOCTYPE html>
<html lang="en">

    <head>
        <base href="{$url}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <title>{$title}</title>
        
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="{$resenias}">
                    <img src="imgs/logo.png" width="25" height="30" class="d-inline-block align-top" alt="">
                    ReseÑas
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="text-white" href="{$reseniasgenero}">Reseñas x Genero</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-white" href="{$login}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-white" href="{$admin}">Admin</a>
                    </li>
                    <li class="nav-item">
                    <a class="text-white" href="{$usuarios}">Usuarios</a>
                </li>
                </ul>
                {if isset($usuario) && $usuario}
                    <div class="navbar-nav ml-auto">
                        <span class="navbar-text nav-link active">{$usuario}</span>
                        <a class="nav-item nav-link " href="salir">Salir<span class="sr-only"></span></a>
                    </div>
                {/if}

            </nav>
        </header>
        <div class="cuerpo">