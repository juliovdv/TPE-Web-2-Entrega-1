<div>
    <div>
        <h5>Modificar reseña </h5>
    </div>
    <form action="editarresenia/" method="POST">
        <select name="id_resenia" class="form-control">
            {foreach from=$tablaresenia item=genero}
                <option value={$genero->id_resenia}>{$genero->nombre_pelicula}</option>
            {/foreach}
        </select>
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

        <button type="submit" class="btn btn-formulario">Modificar</button>
    </form>
</div>