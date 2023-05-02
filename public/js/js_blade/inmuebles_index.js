//funcion togle
$(function (event) {
    $("#btn_toogle").click(function () {
        $("#section_propiedad_horizontal").toggle(function () {
            let btn_text = $("#btn_toogle").text();

            if (btn_text == "Si") {
                $("#btn_toogle").text("No");
                btn_text = "No";
            }
            else {
                $("#btn_toogle").text("Si");
                btn_text = "Si";
            }
        });


    });
});

//clean inputs
$(function (event) {
    $(".clear").click(function () {
        $(".campos").val("");
        $(".campos").text("");
        //TODO: asegurarme que los check se limpien cuando se cargue el formulario de nuevo
        document.querySelector('.campos').checked = false
    });
});





$(function (event) {
    $("#modalAdmin")
        .off()
        .on("show.bs.modal", function (e) {
            let option = $(e.relatedTarget).data("option");
            let template = $(e.relatedTarget).data("template");

            $("#option_select").val(option);
            if (option == "create") {
                $("#modal-title").text("Crear Visita");
                document.getElementById('visitador_nombre').removeAttribute("disabled");
                return;
            }
            if (option == "update") {
                document.getElementById('visitador_nombre').setAttribute("disabled", "disabled");


                $("#modal-title").text("Editar Visita");

                $.ajax({
                    type: "GET",
                    url: "inmuebles/" + template,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    async: true,
                    success: function (response) {
                        $("#visitador_nombre").val(response.inmueble.visitador_nombre);
                        $("#montaje").val(response.inmueble.montaje);
                        $("#fecha_visita").val(response.inmueble.fecha_visita);
                        //$("#hora").val(response.inmueble.hora);
                        $("#direccion").val(response.inmueble.direccion);
                        $("#barrio").val(response.inmueble.barrio);
                        $("#atendido_por").val(response.inmueble.contacto_nombres + " " + response.inmueble.contacto_apellidos);
                        $("#telefono").val(response.inmueble.telefono);
                        $("#banco").val(response.inmueble.cliente_nombres + " " + response.inmueble.cliente_apellidos);
                        $("#nombre_conjunto").val(response.inmueble.nombre_conjunto);

                        $("#estrato").val(response.inmueble.estrato);
                        $("#detalle_topografia").val(response.inmueble.detalle_topografia);
                        $("#numero_pisos").val(response.inmueble.numero_pisos);
                        $("#numero_sotanos").val(response.inmueble.numero_sotanos);
                        $("#detalle_tipo_inmueble").val(response.inmueble.detalle_tipo_inmueble);
                        $("#detalle_uso_actual").val(response.inmueble.detalle_uso_actual);
                        $("#detalle_estado_construccion").val(response.inmueble.detalle_estado_construccion);

                        //seleccionamos los documentos y dotaciones con los que cuenta el inmueble al momento
                        response.documentos_suministrados.forEach(element => { $("#doc-" + element.id).prop("checked", true); });
                        response.dotacion_comunal.forEach(element => { $("#dot-" + element.id).prop("checked", true); });
                        response.servicios_sector.forEach(element => { $("#sector-" + element.id).prop("checked", true); });
                        response.servicios_predio.forEach(element => { $("#predio-" + element.id).prop("checked", true); });
                        response.servicios_contador.forEach(element => { $("#contador-" + element.id).prop("checked", true); });

                        $("#dependencia_id").val(response.inmueble.dependencia_id);
                        $("#salas").val(response.inmueble.salas);
                        $("#salas_area").val(response.inmueble.salas_area);
                        $("#salas_detalle").val(response.inmueble.salas_detalle);
                        $("#comedores").val(response.inmueble.comedores);
                        $("#comedores_area").val(response.inmueble.comedores_area);
                        $("#comedores_detalle").val(response.inmueble.comedores_detalle);
                        $("#estudios").val(response.inmueble.estudios);
                        $("#estudios_area").val(response.inmueble.estudios_area);
                        $("#estudios_detalle").val(response.inmueble.estudios_detalle);
                        $("#banos_sociales").val(response.inmueble.banos_sociales);
                        $("#banos_sociales_area").val(response.inmueble.banos_sociales_area);
                        $("#banos_sociales_detalle").val(response.inmueble.banos_sociales_detalle);
                        $("#star_habitaciones").val(response.inmueble.star_habitaciones);
                        $("#star_habitaciones_area").val(response.inmueble.star_habitaciones_area);
                        $("#star_habitaciones_detalle").val(response.inmueble.star_habitaciones_detalle);
                        $("#habitaciones").val(response.inmueble.habitaciones);
                        $("#habitaciones_area").val(response.inmueble.habitaciones_area);
                        $("#habitaciones_detalle").val(response.inmueble.habitaciones_detalle);
                        $("#banos_privados").val(response.inmueble.banos_privados);
                        $("#banos_privados_area").val(response.inmueble.banos_privados_area);
                        $("#banos_privados_detalle").val(response.inmueble.banos_privados_detalle);
                        $("#cocinas").val(response.inmueble.cocinas);
                        $("#cocinas_area").val(response.inmueble.cocinas_area);
                        $("#cocinas_detalle").val(response.inmueble.cocinas_detalle);
                        $("#cuartos_servicio").val(response.inmueble.cuartos_servicio);
                        $("#cuartos_servicio_area").val(response.inmueble.cuartos_servicio_area);
                        $("#cuartos_servicio_detalle").val(response.inmueble.cuartos_servicio_detalle);
                        $("#banos_servicio").val(response.inmueble.banos_servicio);
                        $("#banos_servicio_area").val(response.inmueble.banos_servicio_area);
                        $("#banos_servicio_detalle").val(response.inmueble.banos_servicio_detalle);
                        $("#patios_ropas").val(response.inmueble.patios_ropas);
                        $("#patios_ropas_area").val(response.inmueble.patios_ropas_area);
                        $("#patios_ropas_detalle").val(response.inmueble.patios_ropas_detalle);
                        $("#terrazas").val(response.inmueble.terrazas);
                        $("#terrazas_area").val(response.inmueble.terrazas_area);
                        $("#terrazas_detalle").val(response.inmueble.terrazas_detalle);
                        $("#jardines").val(response.inmueble.jardines);
                        $("#jardines_area").val(response.inmueble.jardines_area);
                        $("#jardines_detalle").val(response.inmueble.jardines_detalle);
                        $("#balcones").val(response.inmueble.balcones);
                        $("#balcones_area").val(response.inmueble.balcones_area);
                        $("#balcones_detalle").val(response.inmueble.balcones_detalle);
                        $("#zonas_verdes").val(response.inmueble.zonas_verdes);
                        $("#zonas_verdes_area").val(response.inmueble.zonas_verdes_area);
                        $("#zonas_verdes_detalle").val(response.inmueble.zonas_verdes_detalle);

                        //validacion de propiedad horizontal para que se despliegue o no el formulario de llenado
                        if (response.inmueble.propiedad_horizontal_id != null || response.inmueble.propiedad_horizontal_id != "") {
                            //$("#section_propiedad_horizontal").hide();
                            $("#section_propiedad_horizontal").show();
                            $("#propiedad_horizontal_id").val(response.inmueble.propiedad_horizontal_id)
                        }

                        $("#conjunto_cerrado").val(response.inmueble.conjunto_cerrado);
                        $("#ubicacion_inmueble").val(response.inmueble.ubicacion_inmueble);
                        $("#numero_edificios").val(response.inmueble.numero_edificios);
                        $("#unidades_por_piso").val(response.inmueble.unidades_por_piso);
                        $("#total_unidades").val(response.inmueble.total_unidades);
                        $("#total_garajes").val(response.inmueble.total_garajes);
                        $("#total_garajes_comunales").val(response.inmueble.total_garajes_comunales);
                        $("#garajes_cubiertos").val(response.inmueble.garajes_cubiertos);
                        $("#garajes_descubiertos").val(response.inmueble.garajes_descubiertos);
                        $("#total_garajes_servidumbre_comunales").val(response.inmueble.total_garajes_servidumbre_comunales);
                        $("#garaje_sencillo").val(response.inmueble.garaje_sencillo);
                        $("#garaje_doble").val(response.inmueble.garaje_doble);
                        $("#total_depositos").val(response.inmueble.total_depositos);
                        $("#observaciones").val(response.inmueble.observaciones);
                    },
                    failure: function (response) { },
                    error: function (response) { },
                    timeout: 100000,
                });
            }
        });
});
//Fin cargar area

//add or update product send
$(function (event) {
    $("#btn_send")
        .off()
        .on("click", function (e) {
            let _token = $("._token").val();
            var str = $("#form_inmueble").serializeArray();
            console.log(str);

            let detalle_documentos_suministrados = "";
            let detalle_servicios_sector = "";
            let detalle_servicios_predio = "";
            let detalle_servicios_contador = "";
            let detalle_dotacion_comunal = "";

            //creamos el objeto que enviaremos con la clave y valor de interes
            var data = new Object();
            jQuery.each(str, function (i, field) {

                //tomamos los check que deberian ir en el mismo campo concatenados iterando el array de objetos del formulario
                if (field.name == "detalle_documentos_suministrados") {
                    if (detalle_documentos_suministrados == "") {
                        detalle_documentos_suministrados = field.value;
                    } else {
                        detalle_documentos_suministrados = detalle_documentos_suministrados + "," + field.value;
                    }
                    data[field.name] = detalle_documentos_suministrados;
                }else
                if (field.name == "detalle_servicios_sector") {
                    if (detalle_servicios_sector == "") {
                        detalle_servicios_sector = field.value;
                    } else {
                        detalle_servicios_sector = detalle_servicios_sector + "," + field.value;
                    }
                    data[field.name] = detalle_servicios_sector;
                }else
                if (field.name == "detalle_servicios_predio") {
                    if (detalle_servicios_predio == "") {
                        detalle_servicios_predio = field.value;
                    } else {
                        detalle_servicios_predio = detalle_servicios_predio + "," + field.value;
                    }
                    data[field.name] = detalle_servicios_predio;
                }else
                if (field.name == "detalle_servicios_contador") {
                    if (detalle_servicios_contador == "") {
                        detalle_servicios_contador = field.value;
                    } else {
                        detalle_servicios_contador = detalle_servicios_contador + "," + field.value;
                    }
                    data[field.name] = detalle_servicios_contador;
                }else
                if (field.name == "detalle_dotacion_comunal") {
                    if (detalle_dotacion_comunal == "") {
                        detalle_dotacion_comunal = field.value;
                    } else {
                        detalle_dotacion_comunal = detalle_dotacion_comunal + "," + field.value;
                    }
                    data[field.name] = detalle_dotacion_comunal;
                }
                else {
                    data[field.name] = field.value;
                }

            });

            $.ajax({
                type: "POST",
                url: "inmuebles/control",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify({
                    _token: _token,
                    option: option,

                    numradicado,
                    fecha: fecha,
                  
                    referente: referente,
                    tipoinmueble: tipoinmueble,
                    direccion: direccion,
                    barrio: barrio,
                    zona: zona,
                    municipio: municipio,
                    departamento: departamento,
                    persona: persona,
                    solicitante: solicitante,
                    contacto: contacto,
                    vrreferente: vrreferente,
                    honorarios: honorarios,
                    observaciones: observaciones,
                }),
                dataType: "json",
                success: function (response) {


                    /*swal(response.message, {
                        icon: "success",
                    }).then(function(){
                        window.location.href = "inmuebles"
                    });*/
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

//Delete user

$(function (event) {
    $(".btn_delete")
        .off()
        .on("click", function (e) {
            //var product = $(this).data("product");
            swal({
                title: "¿Eliminar Radicado?",
                text: "¡Estas a punto de eliminar el registro!",
                type: "warning",
                buttons: {
                    cancel: {
                        visible: true,
                        text: "No!",
                        className: "btn btn-danger",
                    },
                    confirm: {
                        text: "Si!",
                        className: "btn btn-success",
                        afterSelect: function () { },
                    },
                },
            }).then((willCreate) => {
                if (willCreate) {
                    $.ajax({
                        type: "GET",
                        url: "adminMailTemplate/" + product + "/delete",
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                    });
                    swal("Hide on store!", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    }).then((navigate) => {
                        window.location.href = "adminMailTemplate";
                    });
                } else {
                    swal("not removed!", {
                        buttons: {
                            confirm: {
                                className: "btn btn-danger",
                            },
                        },
                    });
                }
            });
        });
});
/*
var routCountry = "country_typea";
$(".typeahead_country").typeahead({
    highlight: true,
    minLength: 0,
}, {
    name: "country",
    display: "country_name",
    limit: 20,
    source: function(query, syncResults, asyncResults) {
        return $.get(
            routCountry, {
                query: query,
            },
            function(data) {
                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_country").bind("typeahead:select", function(ev, data) {
    $("#id_country").val(data.country_id);
});

*/
