{include 'templates/header.tpl'}

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav .sidenav">
            <form action="verificar" method="POST">
                <div class="form-group">
                    <label>Usuario</label>
                    <input name="usuario" type="text" class="form-control" placeholder="Introdusca Mail">
                </div>
                <div class="form-group">
                    <label>Clave</label>
                    <input name="clave" type="password" class="form-control" placeholder="Introdusca Clave">
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </form>
            {if $mensaje}
                <div class= "alert alert-danger">
                 {$mensaje}
                </div>
                {/if}
        </div>
        <div class="col-sm-9">
            <form action="crearusuario" method="POST">
                <div class="form-group">
                    <label>Usuario</label>
                    <input name="usuario" type="text" class="form-control" placeholder="Introdusca Mail">
                </div>
                <div class="form-group">
                    <label>Clave</label>
                    <input name="clave" type="password" class="form-control" placeholder="Introdusca Clave">
                </div>
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>
        </div>
    </div>
</div>


{include 'templates/footer.tpl'}