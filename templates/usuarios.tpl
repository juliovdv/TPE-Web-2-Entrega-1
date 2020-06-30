{include 'templates/header.tpl'}
<div class="container text-white">
    <h4>Lista Usuarios</h4>
    <ul class="list-group list-padd">
        {foreach from=$tablausuario item=usuario}
            <li class="list-group-item bg-transparent">
                <b>{$usuario->mail}</b>
                {if $usuario->admin}
                    Es admin
                {else}
                    <a class="btn" href="">Hacer admin</a>
                {/if}   
                <a class="btn" href="">Borrar usuario</a>
    
    
    
            </li>
        {/foreach}
    </ul>
</div>
{include 'templates/footer.tpl'}