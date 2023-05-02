//Limpia los campos que fueron cargados con informacion al editar
$(function (event) {
    $(document).ready(function () {
        $('.custom-select').select2();
    });
});
function ocultaApellidos() {
    let documento = document.getElementById('id_tipo_documento');
    let id_documento = documento.value;
    console.log(id_documento);
    if (id_documento == 13) {
        console.log("es igual");
        document.getElementById('apellidos').style.display = 'none';
        document.getElementById('label_apellidos').style.display = 'none';
        document.getElementById('label_nombres').innerHTML = "Nombre o Razón Social";
        $('#apellidos').val('-');
    } else {
        document.getElementById('apellidos').style.display = 'block';
        document.getElementById('label_apellidos').style.display = 'block';
        document.getElementById('label_nombres').innerHTML = "Nombres";
    }
}

$(function (event) {
    $(document).ready(function () {
        document.getElementById('card_contacto').style.display = 'none';
    });
});

$(function (event) {
    const ocultar = document.getElementById('btn_contacto');
    ocultar.addEventListener('click', () => {
        let contacto = document.getElementById('card_contacto');
        let currentDisplay = contacto.style.display;
        if (currentDisplay === 'block') {
            contacto.style.display = 'none';
        } else {
            contacto.style.display = 'block';
        }
    })
});

function FbotonDecide() {
    var decide = document.getElementById('btn_contacto');
    if (decide.innerText == 'Cerrar')
        decide.innerText = 'Abrir';
    else decide.innerText = 'Cerrar';
}

$(function (event) {
    $(".clear").click(function () {
        $(".campos").val("");
        $(".campos").text("");
    });
});


let id_dep = 0;
let id_text = 0;
let recibe_id = 0;
//esta modal se despliega al dar click en crear o editar, si es editar carga una funcion ajax con la informacion del dato
$(function (event) {
    $("#modalSolicitante")
        .off()
        .on("show.bs.modal", function (e) {

            let option = $(e.relatedTarget).data("option");
            let id = $(e.relatedTarget).data("id");
            $("#persona_id").val(id);
            $("#option_select").val(option);
            if (option == "create") {
                $("#modal-title").text("Creando nuevo solicitante");
                $("#persona_id").val("");
                return;
            }
            if (option == "update") {
                $.ajax({
                    type: "GET",
                    url: "infoSolicitante/" + id,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    async: true,
                    success: function (response) {

                        $('#persona_id').val(response[0].persona_id);
                        $('#persona_tipo').val(response[0].persona_tipo),
                        $("#id_tipo_documento").val(response[0].tipo_documento_id);
                        $("#tipo_documento_nombre").val(response[0].tipo_documento_nombre);
                        $("#numero_documento").val(response[0].numero_documento);
                        $("#nombres").val(response[0].nombres);
                        $("#apellidos").val(response[0].apellidos);
                        $("#celular").val(response[0].celular);
                        $("#telefono_fijo").val(response[0].telefono_fijo);
                        $("#correo").val(response[0].correo);
                       /* $("#codigo_postal").val(response[0].codigo_postal);
                        $("#direccion").val(response[0].direccion);
                        $("#id_municipio").val(response[0].municipio_id);
                        $(".typeahead_municipio").val(response[0].municipio_nombre);*/
                        $('#contacto_nombre').val(response[0].contacto_nombres),
                            $('#contacto_telefono').val(response[0].contacto_telefono),
                            $('#contacto_cargo').val(response[0].contacto_cargo),
                           /* $("#id_departamento").val(response[0].departamento_id);
                        $(".typeahead_departamento").val(response[0].departamento_nombre);
                        // $("#contacto").val(response[0].contacto_nombres + " " + response[0].contacto_apellidos);*/

                        $("#modal-title").text("Actualizando datos del solicitante :  " + " " + response[0].nombres + " " + response[0].apellidos);
                    },
                    failure: function (response) { },
                    error: function (response) { },
                    timeout: 100000,
                });

            }
        });
});
//Fin cargar area

//Envio de informacion para actualizar o crear 
$(function (event) {
    $("#btn_send")
        .off()
        .on("click", function (e) {
            let _token = $("._token").val();
            let id = $("#persona_id").val();
            let persona_tipo = $('#persona_tipo').val();
            let detalle_tipo_documento_id = $("#id_tipo_documento").val();

            let numero_documento = $("#numero_documento").val();
            let nombres = $("#nombres").val();
            let apellidos = $("#apellidos").val();
            let celular = $("#celular").val();
            let telefono_fijo = $("#telefono_fijo").val();
            let correo = $("#correo").val();
            let codigo_postal = $("#codigo_postal").val();
            /*let direccion = $("#direccion").val();
            let municipio_id = $("#id_municipio").val();*/
            let contacto_nombres = $('#contacto_nombre').val();
            let contacto_telefono = $('#contacto_telefono').val();
           /* let contacto_cargo = $('#contacto_cargo').val();*/
            /*let departamento_id = $("#id_departamento").val();*/

            let option = $("#option_select").val();

            /*
             *Funciona Ajax actualizar o crear
             */
            $.ajax({
                type: "POST",
                url: "controlSolicitante",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify({
                    _token: _token,
                    option: option,
                    id: id,
                    persona_tipo: persona_tipo,
                    detalle_tipo_documento_id: detalle_tipo_documento_id,
                    numero_documento: numero_documento,
                    nombres: nombres,
                    apellidos: apellidos,
                    celular: celular,
                    telefono_fijo: telefono_fijo,
                    correo: correo,
                    codigo_postal: codigo_postal,
                    /*direccion: direccion,
                    municipio_id: municipio_id,*/
                    contacto_nombres: contacto_nombres,
                    contacto_telefono: contacto_telefono,
                    /*contacto_cargo: contacto_cargo,*/


                }),
                dataType: "json",
                success: function (response) {
                    //TODO: mejorar el intervalo de tiempo
                    swal(response.message, {
                        icon: "success",
                    }).then(function () {
                        location.reload();
                    });
                },
                failure: function (response) {
                    swal(response.responseJSON.message, "", "error");
                },
                error: function (response) {
                    swal(response.responseJSON.message, "", "error");
                },
                timeout: 1000,
            });
        });
});


//Eliminar un registro
$(function (event) {
    $(".btn_delete")
        .off()
        .on("click", function (e) {
            let id = $(e.currentTarget).data("persona_id");
            let _token = $("._token").val();
            swal({
                title: "Estas seguro?",
                text: "Una vez eliminado, ¡no podrá recuperar este registro!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "personas/" + id + "/eliminarSolicitante",
                            contentType: "application/json; charset=utf-8",
                            data: JSON.stringify({
                                _token: _token,
                                id: id
                            }),
                            dataType: "json",
                            success: function (response) {
                                swal("El registro ha sido eliminado!", {
                                    icon: "success",
                                });
                                //navegacion a pagina despues del click en el boton de confirmacion de accion del Swal
                                $(".swal-button--confirm").off().on("click", function (e) { window.location.href = "personas" });
                            },
                            failure: function (response) {
                                swal(response.responseJSON.message, "", "error");
                            },
                            error: function (response) {
                                swal(response.responseJSON.message, "", "error");
                            },
                            timeout: 1000
                        });


                    } else {
                        swal("El registro esta a salvo!");
                    }
                });
        });
});



$(function (event) {
    $("#modalVerVisitadores")
        .off()
        .on("show.bs.modal", function (e) {
            $("#modal-title2").text("Consultando Visitadores");

            $('#table_visitadores').DataTable({
                ajax: 'ver_visitadores',
                columns: [
                    { data: 'name' },
                    { data: 'email' },

                ]

            });
        });
});

var table = $('#example').DataTable();

//Typeahead Departamento
$(".typeahead_departamento").typeahead({
    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "departamentos",
    display: "nombre",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            "depa", {
            query: query,
        },
            function (data) {

                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_departamento").bind("typeahead:select", function (ev, data) {
    $("#id_departamento").val(data.id);
    id_dep = data.id;

    $(".typeahead_municipio").val(" ");
    $("#id_municipio").val("");
});

//Typeahead Municipio dependiendo del departamento
$(".typeahead_municipio").typeahead({
    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "municipios",
    display: "nombre",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            'muni/' + id_dep, {
            query: query,
        },
            function (data) {
                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_municipio").bind("typeahead:select", function (ev, data) {
    $("#id_municipio").val(data.id);
});

$(".typeahead_contacto").typeahead({
    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "contactos",
    display: "nombre_completo",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            'contacto', {
            query: query,
        },
            function (data) {
                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_contacto").bind("typeahead:select", function (ev, data) {
    $("#contacto_id").val(data.id);
});
