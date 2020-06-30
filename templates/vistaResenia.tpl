{include 'templates/header.tpl'}



<h1> {$resenia->nombre_pelicula} </h1>
<p> <b>Usuario: </b>{$resenia->usuario} </p>
<p> <b>Genero: </b>{$genero} </p>
<p> <b>Reseña: </b> {$resenia->resenia} </p>
{if isset($resenia->img)}
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{$resenia->img}" alt="Los Angeles">
      </div>
  
      <div class="item">
        <img src="{$resenia->img}" alt="Chicago">
      </div>
  
      <div class="item">
        <img src="{$resenia->img}" alt="New York">
      </div>
    </div>
  
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
{/if}

<a href="{$resenias}">Volver</a>



{include 'templates/footer.tpl'}