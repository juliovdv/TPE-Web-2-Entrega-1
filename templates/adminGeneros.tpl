<div class="container">
    <h5>Lista Generos</h5>
    <ul class="list-group list-padd">
        {foreach from=$tablagenero item=genero}
            <li class="list-group-item">
                <b>{$genero->nombre}</b>
                <a class="btn" href="modificargenero/{$genero->id_genero}">Modificar</a>
                <a class="btn" href="eliminargenero/{$genero->id_genero}"> Borrar </a>
            </li>
        {/foreach}
    </ul>
</div>

