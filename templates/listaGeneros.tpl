{include 'templates/header.tpl'}

<div class="container">
    <h1>Lista Generos</h1>
    {include 'templates/formularioGenero.tpl'}
    <ul class="list-group list-padd">
        {foreach from=$tabla item=genero}
            <li class="list-group-item">
            <b>{$genero->nombre}</b>
            <a class="btn" href="eliminargenero/{$genero->id_genero}"> Borrar </a>
            </li>
        {/foreach}
    </ul>
</div>

{include 'templates/footer.tpl'}
