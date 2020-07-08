<section id="usuario" es-admin="{$esadmin}" es-usuario="{$usuario}">
{literal}  
    <div id="listacomentarios">
        <p> <b>Promedio: </b>
        <h1>{{promedio}}</h1>
        </p>
        <div class="col-md-9">
            <h4>Comentarios</h4>
            <div>
                <form v-if="mail">
                    <label>Comentario</label>
                    <textarea id="comentario" name="comentario" type="text" class="form-control" rows="3"></textarea>
                    <label>Puntaje</label>
                    <select id="puntaje" name="puntaje"  class="form-control">
    
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
    
                    </select>
                    <button v-on:click="agregarComentario()" type="button" class="btn btn-formulario">Enviar</button>
                </form>
                <ul>
                    <li v-for="comentario in comentarios">
                        Usuario: {{comentario.usuario}} Comentario: {{comentario.comentario}} Puntaje: {{comentario.puntuacion}}
                        <button v-if="esAdmin" v-on:click="borrarComentario(comentario.id_comentario)">Borrar</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
{/literal}
</section>