{include 'templates/header.tpl'}

<div class="container">
    <h1>Lista reseñas</h1>
    {include 'templates/formularioResenia.tpl'}
    <ul class="list-group list-padd">
        {foreach from=$tabla item=resenia}
            <li class="list-group-item">
            <b>{$resenia->nombre_pelicula}</b>
            <a class="btn" href="detalle/{$resenia->id_resenia}">Ver</a>
            <a class="btn" href="eliminarresenia/{$resenia->id_resenia}"> Borrar </a>
            </li>
        {/foreach}
    </ul>
</div>

{include 'templates/footer.tpl'}
