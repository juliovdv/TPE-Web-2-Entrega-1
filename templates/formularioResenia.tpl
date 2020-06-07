<div class="titulo-formulario">
    <h5>Agregar pelicula </h5>
</div>
<form action="agregarresenia" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label> Pelicula</label>
        <input name="nombre_pelicula" type="text" class="form-control">
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
    <div class="form-group">
        <label>Caratula</label>
        <input type="file" name="input_name" id="imageToUpload">
    </div>


    <button type="submit" class="btn btn-formulario">Agregar</button>
</form>