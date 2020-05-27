<div class="container text-white">
    <h4>Lista Generos</h4>
    <ul class="list-group list-padd">
        {foreach from=$tablagenero item=genero}
            <li class="list-group-item bg-transparent">
            <b>{$genero->nombre}</b>
            <a class="btn" href="reseniasxgenero/{$genero->id_genero}">Ver reseñas</a>

            </li>
        {/foreach}
    </ul>
</div>
