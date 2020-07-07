{include 'templates/header.tpl'}
<div class="container text-white">
    <h4>Lista Usuarios</h4>
    <ul class="list-group list-padd">
        {foreach from=$tablausuario item=usuario}
            <li class="list-group-item bg-transparent">
                <b>{$usuario->mail}</b>
                {if $usuario->admin}
                    <a class="btn" href="haceradmin/{$usuario->id_usuario}/0">No admin</a>
                {else}
                    <a class="btn" href="haceradmin/{$usuario->id_usuario}/1">Admin</a>
                {/if}   
                <a class="btn" href="borraruser/{$usuario->id_usuario}">Borrar usuario</a>
    
    
    
            </li>
        {/foreach}
    </ul>
</div>
{include 'templates/footer.tpl'}