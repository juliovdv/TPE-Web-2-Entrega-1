{include 'templates/header.tpl'}
<div class="container text-white">
    <h4>Lista Usuarios</h4>
    <ul class="list-group list-padd">
        {foreach from=$tablausuario item=user}
            <li class="list-group-item bg-transparent">
                <b>{$user->mail}</b>
                {if $user->mail eq $usuario}
                    <span class="badge badge-secondary"> Soy yo </span>
                {else}
                    {if $user->admin}
                        <a class="btn" href="haceradmin/{$user->id_usuario}/0">No admin</a>
                    {else}
                        <a class="btn" href="haceradmin/{$user->id_usuario}/1">Admin</a>
                    {/if}
                    <a class="btn btn-danger" href="borraruser/{$user->id_usuario}">X</a>
                {/if}
            </li>
        {/foreach}
    </ul>
</div>

{include 'templates/footer.tpl'}