"use strict"
let app = new Vue({
    el: '#app',

    data: {
        comentarios: []
    },
    methods: {
        borrarComentario: function (id) {
            fetch('api/comentario/' + id, {
                "method": "DELETE",
                "mode": 'cors',
                "headers": { "Content-Type": "application/json" }
            })
                .then(response => response.json())
                .then(mostrarComentarios())
        },
        agregarComentario: function (comentario, puntaje) {
            let param = window.location.pathname.split("/");
            let id_resenia = param[(param.length - 1)];
            let datos = {
                "id_resenia": id_resenia,
                "cometario": comentario,
                "usuario": "1",
                "puntuacion": puntaje
            }

            fetch('api/comentario' , {
                "method": "POST",
                "mode": 'cors',
                "headers": { "Content-Type": "application/json" },
                "body": JSON.stringify(datos)
            })
                .then(response => response.json())
                .then(mostrarComentarios())
        }
    }

});
function mostrarComentarios() {
    let param = window.location.pathname.split("/");
    let id = param[(param.length - 1)];
    fetch('api/resenias/' + id, {
        "method": "GET",
        "mode": 'cors',
        "headers": { "Content-Type": "application/json" }
    })

        .then(response => response.json())
        .then(json => {
            app.comentarios = json;
        })
}
mostrarComentarios();



