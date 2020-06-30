{include 'templates/header.tpl'}
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav .sidenav text-white">
            <div>
                {include 'templates/formularioGenero.tpl'}
            </div>
            <div>
                {include 'templates/formularioResenia.tpl'}
            </div>
        </div>

        <div class="col-sm-9">
            
            <div class="row">
                <div class="col-sm">
                    {include 'templates/editarGenero.tpl'}
                </div>
                <div class="col-sm">
                    {include 'templates/editarResenia.tpl'}
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    {include 'templates/adminGeneros.tpl'}
                </div>
                <div class="col-sm">
                    {include 'templates/adminResenias.tpl'}
                </div>
            </div>
        </div>
    </div>
</div>
{include 'templates/footer.tpl'}