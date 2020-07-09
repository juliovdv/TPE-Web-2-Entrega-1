{include 'templates/header.tpl'}

<div class="container">

<h1> {$resenia->nombre_pelicula} </h1>
<p> <b>Usuario: </b>{$resenia->usuario} </p>
<p> <b>Genero: </b>{$genero} </p>
<p> <b>Reseña: </b> {$resenia->resenia} </p>




{if isset($resenia->img)}
  
  <img src="{$resenia->img}">
  
{/if}

{include 'templates/vue/comentarios.tpl'}


<a href="{$resenias}">Volver</a>
</div>

<script type="text/javascript" src="js/main.js"></script>
{include 'templates/footer.tpl'}