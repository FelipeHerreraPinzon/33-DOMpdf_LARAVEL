//Variables globales

$(function (event) {
    $(document).ready(function () {
        $('.custom-select').select2();
    });
});



/*function toCurrency(string) {
    return string.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
}
// con esta funcion doy formato a miles y decimales
function check(obj) {
    //Reemplaxamos la coma por un punto y le asignamos presicion de 2 decimales.
    let val = parseFloat(obj.value.replace(".", ",")).toFixed(2);

    //Aplicamos el formato deseado
    val = toCurrency(val);
    //Actualizamos el valor
    obj.value = val;
}*/


// funcion en javascript para dar formato al input

/*$(function (event) {
    $(document).ready(function () {

        const number = document.querySelector('.number');

        function formatNumber(n) {
            n = String(n).replace(/\D/g, "");
            return n === '' ? n : Number(n).toLocaleString();
        }
        number.addEventListener('keyup', (e) => {
            const element = e.target;
            const value = element.value;
            element.value = formatNumber(value);
        });
    });
});*/




$(function (event) {
    $(document).ready(function () {
        document.getElementById('card_honorarios').style.display = 'none';
    });
});

$(function (event) {
    const ocultar = document.getElementById('btn_honorarios');
    ocultar.addEventListener('click', () => {
        let honorarios = document.getElementById('card_honorarios');
        let currentDisplay = honorarios.style.display;
        if (currentDisplay === 'block') {
            honorarios.style.display = 'none';
        } else {
            honorarios.style.display = 'block';
        }
    })
});


//Limpia los campos que fueron cargados con informacion al editar
$(function (event) {
    $(".clear").click(function () {
        $(".campos").val("");
        $(".campos").text("");
    });
});
let id_dep = 0;


//esta modal se despliega al dar click en crear o editar, si es editar carga una funcion ajax con la informacion del dato
$(function (event) {
    $("#modalAdmin")
        .off()
        .on("show.bs.modal", function (e) {
            let option = $(e.relatedTarget).data("option");
            let id = $(e.relatedTarget).data("id");

            $("#option_select").val(option);
            if (option == "create") {
                $("#modal-title").text("Radicando nueva Solicitud");
                $("#radicado_id").val("");
                return;
            }
            if (option == "update") {
                $("#modal-title").text("Editar Radicado:  ");

                $.ajax({
                    type: "GET",
                    url: "radicados/" + id,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    async: true,
                    success: function (response) {
                        console.log(response);
                        $("#numero_radicado").val(response.numero_radicado);
                        $("#radicado_id").val(response.radicado_id);
                        $("#fecha").val(response.radicado_fecha);
                        console.log($("#fecha").text());
                        $("#referente").val(response.referente_nombres + " " + response.referente_apellidos);
                        $("#id_referente").val(response.referente_id);
                        $("#id_tipo_inmueble").val(response.tipo_inmueble_id);
                        $("#id_tipo_credito").val(response.tipo_credito_id);
                        $("#direccion").val(response.direccion);
                        console.log(response.direccion)
                        $("#barrio").val(response.barrio);
                        $("#zona").val(response.zona);
                        $("#id_municipio").val(response.municipio_id);
                        $(".typeahead_municipio").val(response.municipio_nombre);
                        $("#id_departamento").val(response.departamento_id);
                        $(".typeahead_departamento").val(response.departamento_nombre);
                        $("#id_cliente").val(response.cliente_id);
                        $(".typeahead_cliente").val(response.cliente_nombres + " " + response.cliente_apellidos);
                        $("#solicitante").val(response.solicitante_nombres + " " + response.solicitante_apellidos);
                        $("#id_solicitante").val(response.id);
                        $("#contacto").val(response.contacto_nombres + " " + response.contacto_apellidos);
                        $("#contacto_id").val(response.contacto_id);
                        $("#valor_referente").val(response.valor_referente);
                        $("#honorarios").val(response.honorarios);
                        $("#fecha_honorarios").val(response.fecha_honorarios);
                        $("#codigo_verificacion").val(response.codigo_verificacion);
                        $("#observaciones").val(response.observaciones);
                        $("#modal-title").text("Editar Radicado:  " + response.numero_radicado);
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
          
            let radicado_id = $("#radicado_id").val();
            let user_id = document.getElementById("user_id").valueAsNumber;
            let numero_radicado = $("#numero_radicado").val();
            let fecha = $("#fecha").val();
          
           
            let referente_id = document.getElementById("id_referente").valueAsNumber;
            let detalle_tipo_inmueble_id = $("#id_tipo_inmueble").val();
           
            let detalle_tipo_credito_id = $("#id_tipo_credito").val();
            let direccion = $("#direccion").val();
            let barrio = $("#barrio").val();
            let zona = $("#zona").val();
            let municipio = document.getElementById("id_municipio").valueAsNumber;
            let solicitante = document.getElementById("id_solicitante").valueAsNumber;
            let cliente = document.getElementById("id_cliente").valueAsNumber;

            let valor_referente = $("#valor_referente").val();
            //console.log($("#valor_referente").val());
            //var valor_referente = $("#valor_referente").val().replace(/[^0-9.-]+/g, "");
            //let valor_referente = Double.parseDouble($("#valor_referente").val());
           // console.log(valor_referente);
            let honorarios = $("#honorarios").val();
            console.log(honorarios);
            let fecha_honorarios = $("#fecha_honorarios").val();
            let codigo_verificacion = $("#codigo_verificacion").val();
            let observaciones = $("#observaciones").val();
            let option = $("#option_select").val();
            /*
             *Funciona Ajax actualizar o crear
             */
            $.ajax({
                type: "POST",
                url: "radicados/control",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify({
                    _token: _token,
                    option: option,
                    id: radicado_id,
                    user_id: user_id,
                    numero_radicado: numero_radicado,
                    fecha: fecha,
                    referente_id: referente_id,
                    detalle_tipo_inmueble_id: detalle_tipo_inmueble_id,
                    detalle_tipo_credito_id: detalle_tipo_credito_id,
                    direccion: direccion,
                    barrio: barrio,
                    zona: zona,
                    municipio_id: municipio,
                    cliente_id: cliente,
                    solicitante_id: solicitante,
                    valor_referente: valor_referente,
                    honorarios: honorarios,
                    fecha_honorarios: fecha_honorarios,
                    codigo_verificacion: codigo_verificacion,
                    observaciones: observaciones
                }),
                dataType: "json",
                success: function (response) {
                    swal(response.message, {
                        icon: "success",
                    }).then(function () {
                        location.reload();
                        //window.location.href = "radicados"
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
            let id = $(e.currentTarget).data("radicado_id");
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
                            url: "radicados/" + id + "/eliminar",
                            contentType: "application/json; charset=utf-8",
                            data: JSON.stringify({
                                _token: _token,
                                id: id
                            }),
                            dataType: "json",
                            success: function (response) {
                                swal(response.message, {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href = "radicados"
                                });
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

// esto ,lo traje del js de asignados //

$(function (event) {
    $("#modalAsignado")
        .off()
        .on("show.bs.modal", function (e) {
            let option = $(e.relatedTarget).data("option");
            let id = $(e.relatedTarget).data("id");
         
            $("#radicados_id").val(id);
            $("#option_select").val(option);
           
                $("#modal-title2").text("Asignacion Solicitud # xxxx");
            console.log("voy a cargar los valores");
                $.ajax({
                    type: "GET",
                    url: "asignados/" + id,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    async: true,
                    success: function (response) {
                        console.log(response);
                        $('#radicado_id').val(response[0].id);
                        $("#numero_radicado").text(response[0].numero_radicado);
                        $("#fecha_asigna").text(response[0].fecha);
                        $("#nombre").text(response[0].solicitante_nombres + " " + response[0].solicitante_apellidos);
                        $(".direccion").text(response[0].direccion);
                        $("#municipio").text(response[0].municipio_nombre);
                        $("#departamento").text(response[0].departamento_nombre);
                        $("#modal-title2").text("Asignacion Solicitud # " + response[0].numero_radicado);
                    },
                    failure: function (response) { },
                    error: function (response) { },
                    timeout: 100000,
                });
            
        });
});
//Fin cargar area

//Envio de informacion para actualizar o crear 
$(function (event) {
    $("#btn_send_asignado")
        .off()
        .on("click", function (e) {
           
            let _token = $("._token").val();
            let id = $("#radicado_id").val();
            let codigo = $("#avaluo_codigo").val();
            let asigna_visitador = $("#asigna_visitador").val();

            let visitador_id = $("#id_visitador").val();
            let valuador_id = $("#id_valuador").val();
            let asigna_valuador = $("#asigna_visitador").val();
            let verificador_id = $("#id_verificador").val();
            let lider_id = $("#id_lider").val();
            let estado_visitador = 158;
            let estado_valuador = 158;
            let estado_verificador = 158;
            //let option = $("#option_select").val();
            /*
             *Funciona Ajax actualizar o crear
             */
            $.ajax({
                type: "POST",
                url: "asignados/control",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify({
                    _token: _token,
                    //option: option,
                    id: id,
                    codigo: codigo,
                    asigna_visitador: asigna_visitador,
                    visitador_id: visitador_id,
                    valuador_id: valuador_id,
                    asigna_valuador: asigna_valuador,
                    verificador_id: verificador_id,
                    lider_id: lider_id,
                    estado_visitador: estado_visitador,
                    estado_valuador: estado_valuador,
                    estado_verificador: estado_verificador,
                }),
                dataType: "json",
                success: function (response) {
                    //TODO: mejorar el intervalo de tiempo
                    swal(response.message, {
                        icon: "success",
                    });
                    //navegacion a pagina despues del click en el boton de confirmacion de accion del Swal 
                    $(".swal-button--confirm").off().on("click", function (e) { window.location.href = "radicados" });
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


$(function (event) {
   
    $("#modalVerVisitadores")
        .off()
        .on("show.bs.modal", function (e) {
            $("#modal-title2").text("Consultando Visitadores");
            //$('#table_visitadores').DataTable().fnDestroy();
            $('#table_visitadores').DataTable({
                destroy: true,
                ajax: 'verVisitadores',
                columns: [
                    { data: 'name' },
                    { data: 'asignado' },
                    { data: 'visitado' },
                    { data: 'proceso' },
                    { data: 'terminado' },
                    { data: 'total' },
                    
                ]
            });
        });
});

var table = $('#example').DataTable();


$(function (event) {
    $("#modalVerValuadores")
        .off()
        .on("show.bs.modal", function (e) {
            $("#modal-title3").text("Consultando Valuadores");
            $('#table_valuadores').DataTable({
                destroy: true,
                ajax: 'verValuadores',
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

//Typeahead referente
$(".typeahead_referente").typeahead({
    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "referentes",
    display: "nombre_completo",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            'persona', {
            query: query,
        },
            function (data) {
                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_referente").bind("typeahead:select", function (ev, data) {
    $("#id_referente").val(data.id);
});

//Typeahead Cliente
$(".typeahead_cliente").typeahead({
    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "clientes",
    display: "nombre_completo",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            'persona', {
            query: query,
        },
            function (data) {
                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_cliente").bind("typeahead:select", function (ev, data) {
    $("#id_cliente").val(data.id);
});

//Typeahead solicitante
$(".typeahead_solicitante").typeahead({
    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "solicitantes",
    display: "nombre_completo",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            'solicitante', {
            query: query,
        },
            function (data) {
                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_solicitante").bind("typeahead:select", function (ev, data) {
    $("#id_solicitante").val(data.id);
});


$(".typeahead_visitador").typeahead({
    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "users",
    display: "name",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            "nombre_visitador", {
            query: query,
        },
            function (data) {
                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_visitador").bind("typeahead:select", function (ev, data) {
    $("#id_visitador").val(data.id);

});

//Typeahead Departamento
$(".typeahead_valuador").typeahead({
    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "users",
    display: "name",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            "nombre_valuador", {
            query: query,
        },
            function (data) {

                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_valuador").bind("typeahead:select", function (ev, data) {
    $("#id_valuador").val(data.id);

});


$(".typeahead_verificador").typeahead({

    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "users",
    display: "name",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            "nombre_verificador", {
            query: query,
        },
            function (data) {

                return asyncResults(data);
            }
        );
    },

});



$(".typeahead_verificador").bind("typeahead:select", function (ev, data) {
    $("#id_verificador").val(data.id);

});

$(".typeahead_lider").typeahead({
    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "users",
    display: "name",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            "nombre_lider", {
            query: query,
        },
            function (data) {

                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_lider").bind("typeahead:select", function (ev, data) {
    $("#id_lider").val(data.id);

});
