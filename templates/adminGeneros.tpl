<div class="container">
    <h5>Lista Generos</h5>
    <ul class="list-group list-padd">
        {foreach from=$tablagenero item=genero}
            <li class="list-group-item">
                <b>{$genero->nombre}</b>
                <a class="btn btn-danger" href="eliminargenero/{$genero->id_genero}"> X </a>
            </li>
        {/foreach}
    </ul>
</div>

