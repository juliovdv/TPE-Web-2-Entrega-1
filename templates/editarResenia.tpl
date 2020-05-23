{include 'templates/header.tpl'}
<div class="titulo-formulario">
    <h5>Modificar reseña </h5>
</div>
<form action="editarresenia/{$id}" method="POST">
    <div class="form-group">
        <label> Pelicula</label>
        <input name="nombre_pelicula" type="text" class="form-control" >
    </div>

    <div class="form-group">
        <label>Genero</label>
        <select name="genero" class="form-control">
            {foreach from=$tablagenero item=genero}
            <option value={$genero->id_genero}>{$genero->nombre}</option>
            {/foreach}
        </select>
    </div>

    <div class="form-group">
        <label>Reseña</label>
        <textarea name="resenia" type="text" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-formulario">Modificar</button>
</form>
{include 'templates/footer.tpl'}