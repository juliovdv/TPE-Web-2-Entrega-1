{include 'templates/header.tpl'}



<h1> {$resenia->nombre_pelicula} </h1>
<p> <b>Usuario: </b>{$resenia->usuario} </p>
<p> <b>Genero: </b>{$genero} </p>
<p> <b>Reseña: </b> {$resenia->resenia} </p>
{if isset($resenia->img)}
  <div class="w3-content" style="max-width:1200px">
  <img class="mySlides" src="{$resenia->img}" style="width:100%">
  <img class="mySlides" src="{$resenia->img}" style="width:100%">
  <img class="mySlides" src="{$resenia->img}" style="width:100%">

  <div class="w3-row-padding w3-section">
    <div class="w3-col s4">
      <img class="demo w3-opacity" src="img_nature_wide.jpg"
      style="width:100%" onclick="currentDiv(1)">
    </div>
    <div class="w3-col s4">
      <img class="demo w3-opacity" src="img_snow_wide.jpg"
      style="width:100%;display:none" onclick="currentDiv(2)">
    </div>
    <div class="w3-col s4">
      <img class="demo w3-opacity" src="img_mountains_wide.jpg"
      style="width:100%;display:none" onclick="currentDiv(3)">
    </div>
  </div>
</div>
  </div>
{/if}
{include 'templates/vue/comentarios.tpl'}

<a href="{$resenias}">Volver</a>


<script type="text/javascript" src="js/main.js"></script>
{include 'templates/footer.tpl'}