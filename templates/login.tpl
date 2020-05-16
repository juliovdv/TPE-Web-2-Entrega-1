{include 'templates/header.tpl'}

<div class="container">
    <form action="verify" method="POST">
        <div class="form-group">
            <label>Usuario</label>
            <input name="username" type="text" class="form-control" placeholder="Introdusca username">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Introdusca password">
        </div>
    <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
    </form>
</div>

{include 'templates/footer.tpl'}