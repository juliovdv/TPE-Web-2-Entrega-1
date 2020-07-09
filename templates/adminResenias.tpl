<div class="container">
    <h5>Lista reseñas</h5>
    <ul class="list-group list-padd">
        {foreach from=$tablaresenia item=resenia}
            <li class="list-group-item">
            <b>{$resenia->nombre_pelicula}</b>
            <a class="btn" href="detalle/{$resenia->id_resenia}">Imagenes/Comentarios</a>
            <a class="btn btn-danger" href="eliminarresenia/{$resenia->id_resenia}"> X </a>

            </li>
        {/foreach}
    </ul>
</div>
