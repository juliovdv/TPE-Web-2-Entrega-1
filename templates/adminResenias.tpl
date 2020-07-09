<div class="container">
    <h5>Lista reseñas</h5>
    <ul class="list-group list-padd">
        {foreach from=$tablaresenia item=resenia}
            <li class="list-group-item">
            <b>{$resenia->nombre_pelicula}</b>
            <a class="btn" href="detalle/{$resenia->id_resenia}">Imagenes/Comentarios</a>
            <a class="btn" href="eliminarresenia/{$resenia->id_resenia}"> Borrar </a>

            </li>
        {/foreach}
    </ul>
</div>
