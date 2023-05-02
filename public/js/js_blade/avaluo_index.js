//Limpia los campos que fueron cargados con informacion al editar
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
   
    $("#modalAvaluo")
        .off()
        .on("show.bs.modal", function (e) {
           
            let option = $(e.relatedTarget).data("option");
            let id = $(e.relatedTarget).data("id");
          
            $("#avaluo_id").val(id);
            $("#option_select").val(option);
            if (option == "create") {
                $("#modal-title").text("Creando nuevo avaluo... (error) por aqui no");
                $("#id_tipo_inmueble").val("");
                return;
            }
            if (option == "update") {
              
                $("#modal-title").text("Control y Seguimiento al avaluo # ... ");
                
                $.ajax({
                    type: "GET",
                    url: "avaluos/" + id,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    async: true,
                    success: function (response) {
                        console.log(response);
                        $('#radicado_id').val(response.avaluo[0].id);
                        $("#numero_radicado").text(response.avaluo[0].numero_radicado);
                        $("#fecha").text(response.avaluo[0].fecha);
                        $("#nombre").text(response.avaluo[0].solicitante_nombres + " " + response.avaluo[0].solicitante_apellidos);
                        $("#direccion").text(response.avaluo[0].direccion);
                        $("#municipio").text(response.avaluo[0].municipio_nombre);
                        $("#departamento").text(response.avaluo[0].departamento_nombre);
                        $("#modal-title").text("Control y seguimiento para el informe de avaluo # " + response.avaluo[0].codigo);
                        $('#asigna_visitador').val(response.avaluo[0].asigna_visitador);
                        $('#visitador_name').val(response.avaluo[0].visitador_nombre);
                       
                        $('#clock').val(response.tiempo[0]);
                       // $('#clock').css('background', 'green'); 
                        $('#clock').addClass(response.tiempo[1]);  
                        $('#fecha_visita').val(response.avaluo[0].fecha_visita);
                        $('#valuador_name').val(response.avaluo[0].valuador_nombre);
                        $('#asigna_valuador').val(response.avaluo[0].asigna_valuador);
                    
                       
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
            let id = $("#radicado_id").val();
            let codigo = $("#avaluo_codigo").val();
            let asigna_visitador = $("#asigna_visitador").val();
            let visitador_id = $("#id_visitador").val();
            let valuador_id = $("#id_valuador").val();
            let asigna_valuador = $("#asigna_visitador").val();
            let verificador_id = $("#id_verificador").val();
            let lider_id = $("#id_lider").val();
            let estado_visitador = "Asignado";
            let estado_valuador = "Asignado";

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

                }),
                dataType: "json",
                success: function (response) {
                    //TODO: mejorar el intervalo de tiempo
                    swal(response.message, {
                        icon: "success",
                    });
                    //navegacion a pagina despues del click en el boton de confirmacion de accion del Swal 
                    $(".swal-button--confirm").off().on("click", function (e) { window.location.href = "asignados" });
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
                                swal("El registro ha sido eliminado!", {
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

