{include 'templates/header.tpl'}
<div class="container">
    <h4>Lista reseñas x genero</h4>

    <ul class="list-group list-padd">
        {foreach from=$tabla item=resenia}
            <li class="list-group-item">
            <b>{$resenia->nombre_pelicula}</b>
            {$resenia->nombre}
            </li>
        {/foreach}
    </ul>
</div>
{include 'templates/footer.tpl'}