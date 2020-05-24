{include 'templates/header.tpl'}

<div class="titulo-formulario">
<h5>Modificar genero </h5>
</div>
<form action="editargenero/{$id}" method="POST">
    <div class="form-group">
        <label> Genero</label>
        <input name="genero" type="text" class="form-control">
    </div>



    <button type="submit" class="btn btn-formulario">Modificar</button>
  
</form>
{include 'templates/footer.tpl'}