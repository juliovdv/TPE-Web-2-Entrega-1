<!DOCTYPE html>
<html lang="en">

    <head>
        <base href="{$url}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
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
                </ul>
            </nav>
        </header>
        <div class="cuerpo">