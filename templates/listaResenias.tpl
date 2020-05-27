<div class="container">
    <h4>Lista reseñas</h4>
    {if $tablaresenia}
        <ul class="list-group list-padd">
            {foreach from=$tablaresenia item=resenia}
                <li class="list-group-item">
                <b>{$resenia->nombre_pelicula}</b> por {$resenia->usuario}
            
                <a class="btn" href="detalle/{$resenia->id_resenia}">Ver</a>
                </li>
            {/foreach}
        </ul>
    {else}
        <h5> No hay reseñas para mostrar</h5>
    {/if}
</div>

