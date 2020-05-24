{include 'templates/header.tpl'}



<h1> {$resenia->nombre_pelicula} </h1>
<p> <b>Usuario: </b>{$resenia->usuario} </p>
<p> <b>Genero: </b>{$genero} </p>
<p> <b>Reseña: </b> {$resenia->resenia} </p>

<a href="{$resenias}">Volver</a>



{include 'templates/footer.tpl'}