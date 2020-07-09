{include 'templates/header.tpl'}

<div class="container-fluid">
    {if $mensaje}
    <div class="alert alert-danger col-md-6 offset-md-3">
        {$mensaje}
    </div>
    {/if}
    <div class="row content">
        <div class="col-sm-3 sidenav .sidenav">
            <h3>Inicio de sesion</h3>
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
        </div>
        <div class="col-sm-9">

            <div class="col-md-6 offset-md-3">
                <h3>Crear usuario</h3>
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
</div>


{include 'templates/footer.tpl'}