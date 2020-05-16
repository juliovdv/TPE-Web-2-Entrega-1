{include 'templates/header.tpl'}
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav .sidenav">
            {include 'templates/listaGeneros.tpl'}
        </div>
        <div class="col-sm-9">
            {include 'templates/listaResenias.tpl'}
        </div>
    </div>
</div>
{include 'templates/footer.tpl'}