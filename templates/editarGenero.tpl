<div>
    <div>
        <h5>Modificar genero </h5>

    </div>
    <form action="editargenero" method="POST">
        <select name="id_genero" class="form-control">
            {foreach from=$tablagenero item=genero}
                <option value={$genero->id_genero}>{$genero->nombre}</option>
            {/foreach}
        </select>
        <div class="form-group">
            <label> Genero</label>
            <input name="genero" type="text" class="form-control">
        </div>



        <button type="submit" class="btn btn-formulario">Modificar</button>

    </form>
</div>