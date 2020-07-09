"use strict"
let mail = document.querySelector("#usuario").getAttribute('es-usuario');
let esAdmin = document.querySelector("#usuario").getAttribute('es-admin');
let listacomentarios = new Vue({
    el: '#listacomentarios',

    data: {
        comentarios: [],
        promedio: 0,
        mail: null,
        esAdmin: 0
    },
    methods: {
        borrarComentario: function (id) {
            fetch('api/comentario/' + id, {
                "method": "DELETE",
                "headers": { "Content-Type": "application/json" }
            })
                .then(response => response.json())
                .then(
                    mostrarComentarios()
                )
        },
        crearComentario: function () {
            let param = window.location.pathname.split("/");
            let id_resenia = param[(param.length - 1)];
            let comentario = document.getElementById("comentario");
            let puntuacion = document.getElementById("puntaje");
            if (comentario != "") {
                let datos = {
                    "id_resenia": id_resenia,
                    "comentario": comentario.value,
                    "usuario": mail,
                    "puntuacion": puntuacion.value
                }
                agregarComentario(datos);
            }
        }
    }
});

function mostrarComentarios() {
    let param = window.location.pathname.split("/");
    let id = param[(param.length - 1)];
    listacomentarios.esAdmin = esAdmin;
    listacomentarios.mail = mail;
    fetch('api/resenias/' + id + '/comentarios', {
        "method": "GET",
        "mode": 'cors',
        "headers": { "Content-Type": "application/json" }
    })

        .then(response => response.json())
        .then(json => {
            listacomentarios.comentarios = json;
            listacomentarios.promedio = calcularPromedio(listacomentarios.comentarios);
        })
}
function calcularPromedio(elementos) {
    let suma = 0;
    let calculo = 0;
    if (elementos.length != "0") {
        for (let elemento of elementos) {
            suma += parseInt(elemento.puntuacion);
        }
        calculo = parseInt(suma / elementos.length);
    }
    return calculo;
}

function agregarComentario(datos) {
    fetch('api/comentario', {
        "method": "POST",
        "headers": { "Content-Type": "application/json"},
        "body": JSON.stringify(datos)

    })
        .then(response => response.json())
        .then(
            mostrarComentarios()
        );
}

mostrarComentarios();




