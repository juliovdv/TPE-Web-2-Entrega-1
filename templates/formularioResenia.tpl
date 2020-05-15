<form action="agregarresenia" method="POST">
    <div class="form-group">
        <label> Pelicula</label>
        <input name="nombre_pelicula" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label>Genero</label>
        <select name="genero" class="form-control">
            <option value="1">Terror</option>
            <option value="2">Comedia</option>
        </select>
    </div>

    <div class="form-group">
        <label>Reseña</label>
        <textarea name="resenia" type="text" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Agregar</button>
</form>