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
                        <select id="puntaje" name="puntaje" class="form-control">
    
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
    
                        </select>
                        <button v-on:click="crearComentario()" type="button" class="btn btn-formulario">Enviar</button>
                    </form>
                </div>
                <div>
                    <div class="row content">
                        <form class="form-inline">
                            <label>Ordenar por</label>
                            <select id="ordenpor" name="ordenpor" class="form-control">
                                <option value="id_comentario">Por defecto</option>
                                <option value="usuario">Usuario</option>
                                <option value="puntuacion">Puntaje</option>
                            </select>
                            <select id="orden" name="orden" class="form-control">
                                <option value="ASC">Ascentende</option>
                                <option value="DESC">Desendente</option>
                            </select>
                        </form>
                        <button class="btn" v-on:click="ordenarPor()">Ordenar</button>
                    </div>
                </div>
                <div>
                    <ul>
                        <li v-for="comentario in comentarios">
                            <p>Usuario: {{comentario.usuario}} Puntaje: {{comentario.puntuacion}}
                                <button class="btn btn-danger" v-if="esAdmin" v-on:click="borrarComentario(comentario.id_comentario)">X</button> </p>
                            <p>Comentario: {{comentario.comentario}}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    {/literal}
</section>