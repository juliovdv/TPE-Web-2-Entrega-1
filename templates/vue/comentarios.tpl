{literal}
    <div class="col-md-9">
    
        <h4>Comentarios</h4>
        <div id="app">
            <form>
                <label>Comentario</label>
                <textarea name="comentario" v_model="comentario" type="text" class="form-control" rows="3"></textarea>
                <label>Puntaje</label>
                <select name="puntaje" v_model="puntaje" class="form-control">
    
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
    
                </select>
                <button v-on:click="agregarComentario(comentario,puntaje)" type="submit" class="btn btn-formulario">Enviar</button>
            </form>
            <ul>
                <li v-for="comentario in comentarios">
                    Usuario: {{comentario.usuario}} Comentario: {{comentario.comentario}} Puntaje: {{comentario.puntuacion}}
                    <button v-on:click="borrarComentario(comentario.id_comentario)">Borrar</button>
                </li>
            </ul>
        </div>
    </div>
{/literal}