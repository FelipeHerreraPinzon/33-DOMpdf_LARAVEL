//Limpia los campos que fueron cargados con informacion al editar
$(function (event) {
    $(".clear").click(function () {
        $(".campos").val("");
        $(".campos").text("");
        $(".campos_checkbox").prop("checked", false);
    });
});

//agregar que hace esto Orlando
$(function (event) {
    $(document).ready(function () {
        document.getElementById("reprogramar").style.display = "none";
    });
});

//agregar que hace esto Orlando
$(function (event) {
    const estado_visita = document.querySelector("#estado_id");

    estado_visita.addEventListener("change", () => {
        let valorOption = estado_visita.value;
        var optionSelect = estado_visita.options[estado_visita.selectedIndex];
        if (optionSelect.text == "Reprogramar") {
            document.getElementById("reprogramar").style.display = "block";
        } else {
            document.getElementById("reprogramar").style.display = "none";
        }
    });
});

let id_dep = 0;

/*$(function (event) {
    $("#modalMapa")
        .off()
        .on("show.bs.modal", function () {
            console.log("si");
            let map = L.map('mi_mapa').setView([4.647434, -74.132478], 12)

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([4.680038, -74.054954]).addTo(map).bindPopup("Oficinas Valorar")
            //L.marker([19.4349, -99.1313]).addTo(map).bindPopup("Templo Mayor")

            map.on('click', onMapClick)
        });
});

function onMapClick(click) {
    var coordenada = click.latlng;
    var latitud = coordenada.lat; // lat  es una propiedad de latlng
    var longitud = coordenada.lng; // lng también es una propiedad de latlng
    alert("Acabas de hacer clic en: \n latitud: " + latitud + "\n longitud: " + longitud);
    L.marker([latitud, longitud]).addTo(map).bindPopup("Mi punto")
};
*/
//esta modal se despliega al dar click en crear o editar, si es editar carga una funcion ajax con la informacion del dato
$(function (event) {
    $("#modalAreaVisita")
        .off()
        .on("show.bs.modal", function (e) {
            let option = $(e.relatedTarget).data("option");
            let id = $(e.relatedTarget).data("id");
            $("#avaluo_id").val(id);

            $("#option_select").val(option);
            if (option == "create") {
                $("#modal-title").text(
                    "deberia se crear Actualización avaluo xxxxx"
                );
                alert("entre por create");
                return;
            }
            if (option == "update") {
                $("#modal-title").text("Actualizar avaluo :  ");

                $.ajax({
                    type: "GET",
                    url: "areas/" + id,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    async: true,
                    success: function (response) {
                        $("#avaluo_id").val(response[0].id);
                        $("#fecha_visita").val(response[0].fecha_visita);
                        $("#novedades").val(response[0].novedades);
                        $("#fecha_asignado").val(response[0].asigna_visitador);

                        $("#estado_id").val(response[0].estado_visitador);
                        $("#sol_nombre").val(
                            response[0].solicitante_nombre +
                                " " +
                                response[0].solicitante_apellidos
                        );
                        $("#sol_direccion").val(
                            response[0].solicitante_direccion
                        );
                        $("#sol_municipio").val(
                            response[0].solicitante_municipio
                        );
                        $("#sol_contacto_nombre").val(
                            response[0].solicitante_contacto_nombre
                        );
                        $("#sol_contacto_telefono").val(
                            response[0].solicitante_contacto_telefono
                        );
                        $("#modal-title").text(
                            "Actualizando avaluo : " + response[0].codigo
                        );
                    },
                    failure: function (response) {},
                    error: function (response) {},
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
            let id = $("#avaluo_id").val();
            let fecha_visita = $("#fecha_visita").val();
            let asigna_visitador = $("#fecha_asignado").val();
            let novedades = $("#novedades").val();
            let estado_visitador = $("#estado_id").val();

            $.ajax({
                type: "POST",
                url: "areas/control",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify({
                    _token: _token,
                    id: id,
                    asigna_visitador: asigna_visitador,
                    fecha_visita: fecha_visita,
                    novedades: novedades,
                    estado_visitador: estado_visitador,
                }),
                success: function (response) {
                    //TODO: mejorar el intervalo de tiempo

                    swal(response.message, {
                        icon: "success",
                    });
                    //navegacion a pagina despues del click en el boton de confirmacion de accion del Swal
                    $(".swal-button--confirm")
                        .off()
                        .on("click", function (e) {
                            window.location.href = "areas";
                        });
                },
                failure: function (response) {
                    alert("ll");
                    swal(response.responseJSON.message, "", "error");
                },
                error: function (response) {
                    alert("vv");
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
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "radicados/" + id + "/eliminar",
                        contentType: "application/json; charset=utf-8",
                        data: JSON.stringify({
                            _token: _token,
                            id: id,
                        }),
                        dataType: "json",
                        success: function (response) {
                            swal("El registro ha sido eliminado!", {
                                icon: "success",
                            });
                            //navegacion a pagina despues del click en el boton de confirmacion de accion del Swal
                            $(".swal-button--confirm")
                                .off()
                                .on("click", function (e) {
                                    window.location.href = "radicados";
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
                } else {
                    swal("El registro esta a salvo!");
                }
            });
        });
});

//Propiedad horizontal funcion toggle del informe para que despliegue o no la seccion de propiedad horizontal
$(function (event) {
    $("#sometido").on("change", function () {
        $sometido = $("#sometido").val();
        if ($sometido == 1) {
            $("#conjunto_cerrado").prop("disabled", false);
            $("#ubicacion_inmueble").prop("disabled", false);
            $("#numero_edificios").prop("disabled", false);
            $("#unidades_por_piso").prop("disabled", false);
            $("#total_unidades").prop("disabled", false);
            $("#total_garajes").prop("disabled", false);
            $("#total_garajes_comunales").prop("disabled", false);
            $("#garajes_cubiertos").prop("disabled", false);
            $("#garajes_descubiertos").prop("disabled", false);
            $("#total_garajes_servidumbre_comunales").prop("disabled", false);
            $("#garaje_sencillo").prop("disabled", false);
            $("#garaje_doble").prop("disabled", false);
            $("#total_depositos").prop("disabled", false);
        }else{
            $("#conjunto_cerrado").prop("disabled", true);
            $("#ubicacion_inmueble").prop("disabled", true);
            $("#numero_edificios").prop("disabled", true);
            $("#unidades_por_piso").prop("disabled", true);
            $("#total_unidades").prop("disabled", true);
            $("#total_garajes").prop("disabled", true);
            $("#total_garajes_comunales").prop("disabled", true);
            $("#garajes_cubiertos").prop("disabled", true);
            $("#garajes_descubiertos").prop("disabled", true);
            $("#total_garajes_servidumbre_comunales").prop("disabled", true);
            $("#garaje_sencillo").prop("disabled", true);
            $("#garaje_doble").prop("disabled", true);
            $("#total_depositos").prop("disabled", true);
        }
    });
});

//Modal crear o editar informe
$(function (event) {
    $("#modalInforme")
        .off()
        .on("show.bs.modal", function (e) {
            let template = $(e.relatedTarget).data("template");
            $("#informe_avaluo_id").val(template);
            //document.getElementById('visitador_nombre').setAttribute("disabled", "disabled");

            $.ajax({
                type: "GET",
                url: "/areas/informeAvaluo/" + template,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                async: true,
                success: function (response) {
                    $("#codigo").val(response.avaluo.codigo);
                    $("#referente_nombre").val(
                        response.avaluo.referente_nombre
                    );
                    $("#solicitante_nombre").val(
                        response.avaluo.solicitante_nombre
                    );
                    $("#banco").val(
                        response.avaluo.cliente_nombres +
                            " " +
                            response.avaluo.cliente_apellidos
                    );
                    $("#visitador_nombre").val(
                        response.avaluo.visitador_nombre
                    );
                    $("#informe_fecha_visita").val(
                        response.avaluo.fecha_visita
                    );
                    $("#montaje").val(response.avaluo.montaje);
                    $("#direccion").val(response.avaluo.direccion);
                    $("#barrio").val(response.avaluo.barrio);
                    $("#zona").val(response.avaluo.zona);
                    $("#atendido_por").val(response.avaluo.atendido_por);
                    $("#telefono").val(response.avaluo.telefono);
                    $("#nombre_conjunto").val(response.avaluo.nombre_conjunto);
                    $("#vetustez").val(response.avaluo.vetustez);
                    $("#latitud").val(response.avaluo.latitud);
                    $("#longitud").val(response.avaluo.longitud);
                    $("#estrato").val(response.avaluo.estrato);
                    $("#sometido").val(response.avaluo.sometido);
                    if (response.avaluo.sometido == 1) {
                        $("#conjunto_cerrado").prop("disabled", false);
                        $("#ubicacion_inmueble").prop("disabled", false);
                        $("#numero_edificios").prop("disabled", false);
                        $("#unidades_por_piso").prop("disabled", false);
                        $("#total_unidades").prop("disabled", false);
                        $("#total_garajes").prop("disabled", false);
                        $("#total_garajes_comunales").prop("disabled", false);
                        $("#garajes_cubiertos").prop("disabled", false);
                        $("#garajes_descubiertos").prop("disabled", false);
                        $("#total_garajes_servidumbre_comunales").prop("disabled", false);
                        $("#garaje_sencillo").prop("disabled", false);
                        $("#garaje_doble").prop("disabled", false);
                        $("#total_depositos").prop("disabled", false);
                    }else{
                        $("#conjunto_cerrado").prop("disabled", true);
                        $("#ubicacion_inmueble").prop("disabled", true);
                        $("#numero_edificios").prop("disabled", true);
                        $("#unidades_por_piso").prop("disabled", true);
                        $("#total_unidades").prop("disabled", true);
                        $("#total_garajes").prop("disabled", true);
                        $("#total_garajes_comunales").prop("disabled", true);
                        $("#garajes_cubiertos").prop("disabled", true);
                        $("#garajes_descubiertos").prop("disabled", true);
                        $("#total_garajes_servidumbre_comunales").prop("disabled", true);
                        $("#garaje_sencillo").prop("disabled", true);
                        $("#garaje_doble").prop("disabled", true);
                        $("#total_depositos").prop("disabled", true);
                    }
                    $("#detalle_topografia").val(
                        response.avaluo.detalle_topografia
                    );
                    $("#direccion_inmueble").val(
                        response.avaluo.direccion_inmueble
                    );
                    $("#numero_pisos").val(response.avaluo.numero_pisos);
                    $("#numero_sotanos").val(response.avaluo.numero_sotanos);
                    $("#detalle_tipo_inmueble").val(
                        response.avaluo.detalle_tipo_inmueble
                    );
                    $("#detalle_uso_actual").val(
                        response.avaluo.detalle_uso_actual
                    );
                    $("#detalle_estado_construccion").val(
                        response.avaluo.detalle_estado_construccion
                    );

                    if (response.avaluo.inmueble_id != null) {
                        //seleccionamos los documentos y dotaciones con los que cuenta el inmueble al momento
                        response.documentos_suministrados.forEach((element) => {
                            $("#doc-" + element.id).prop("checked", true);
                        });
                        response.dotacion_comunal.forEach((element) => {
                            $("#dot-" + element.id).prop("checked", true);
                        });
                        response.servicios_sector.forEach((element) => {
                            $("#sector-" + element.id).prop("checked", true);
                        });
                        response.servicios_predio.forEach((element) => {
                            $("#predio-" + element.id).prop("checked", true);
                        });
                        response.servicios_contador.forEach((element) => {
                            $("#contador-" + element.id).prop("checked", true);
                        });
                    }

                    $("#informe_dependencia_id").val(
                        response.avaluo.dependencia_id
                    );
                    $("#informe_inmueble_id").val(response.avaluo.inmueble_id);
                    $("#informe_sector_id").val(response.avaluo.sector_id);
                    //$("#informe_juridica_id").val(response.avaluo.juridica_id);
                    $("#salas").val(response.avaluo.salas);
                    $("#salas_area").val(response.avaluo.salas_area);
                    $("#salas_detalle").val(response.avaluo.salas_detalle);
                    $("#comedores").val(response.avaluo.comedores);
                    $("#comedores_area").val(response.avaluo.comedores_area);
                    $("#comedores_detalle").val(
                        response.avaluo.comedores_detalle
                    );
                    $("#estudios").val(response.avaluo.estudios);
                    $("#estudios_area").val(response.avaluo.estudios_area);
                    $("#estudios_detalle").val(
                        response.avaluo.estudios_detalle
                    );
                    $("#banos_sociales").val(response.avaluo.banos_sociales);
                    $("#banos_sociales_area").val(
                        response.avaluo.banos_sociales_area
                    );
                    $("#banos_sociales_detalle").val(
                        response.avaluo.banos_sociales_detalle
                    );
                    $("#star_habitaciones").val(
                        response.avaluo.star_habitaciones
                    );
                    $("#star_habitaciones_area").val(
                        response.avaluo.star_habitaciones_area
                    );
                    $("#star_habitaciones_detalle").val(
                        response.avaluo.star_habitaciones_detalle
                    );
                    $("#habitaciones").val(response.avaluo.habitaciones);
                    $("#habitaciones_area").val(
                        response.avaluo.habitaciones_area
                    );
                    $("#habitaciones_detalle").val(
                        response.avaluo.habitaciones_detalle
                    );
                    $("#banos_privados").val(response.avaluo.banos_privados);
                    $("#banos_privados_area").val(
                        response.avaluo.banos_privados_area
                    );
                    $("#banos_privados_detalle").val(
                        response.avaluo.banos_privados_detalle
                    );
                    $("#cocinas").val(response.avaluo.cocinas);
                    $("#cocinas_area").val(response.avaluo.cocinas_area);
                    $("#cocinas_detalle").val(response.avaluo.cocinas_detalle);
                    $("#cuartos_servicio").val(
                        response.avaluo.cuartos_servicio
                    );
                    $("#cuartos_servicio_area").val(
                        response.avaluo.cuartos_servicio_area
                    );
                    $("#cuartos_servicio_detalle").val(
                        response.avaluo.cuartos_servicio_detalle
                    );
                    $("#banos_servicio").val(response.avaluo.banos_servicio);
                    $("#banos_servicio_area").val(
                        response.avaluo.banos_servicio_area
                    );
                    $("#banos_servicio_detalle").val(
                        response.avaluo.banos_servicio_detalle
                    );
                    $("#patios_ropas").val(response.avaluo.patios_ropas);
                    $("#patios_ropas_area").val(
                        response.avaluo.patios_ropas_area
                    );
                    $("#patios_ropas_detalle").val(
                        response.avaluo.patios_ropas_detalle
                    );
                    $("#terrazas").val(response.avaluo.terrazas);
                    $("#terrazas_area").val(response.avaluo.terrazas_area);
                    $("#terrazas_detalle").val(
                        response.avaluo.terrazas_detalle
                    );
                    $("#jardines").val(response.avaluo.jardines);
                    $("#jardines_area").val(response.avaluo.jardines_area);
                    $("#jardines_detalle").val(
                        response.avaluo.jardines_detalle
                    );
                    $("#balcones").val(response.avaluo.balcones);
                    $("#balcones_area").val(response.avaluo.balcones_area);
                    $("#balcones_detalle").val(
                        response.avaluo.balcones_detalle
                    );
                    $("#zonas_verdes").val(response.avaluo.zonas_verdes);
                    $("#zonas_verdes_area").val(
                        response.avaluo.zonas_verdes_area
                    );
                    $("#zonas_verdes_detalle").val(
                        response.avaluo.zonas_verdes_detalle
                    );

                    //validacion de propiedad horizontal para que se despliegue o no el formulario de llenado
                    if (
                        response.avaluo.propiedad_horizontal_id != null ||
                        response.avaluo.propiedad_horizontal_id != ""
                    ) {
                        //$("#section_propiedad_horizontal").hide();
                        $("#section_propiedad_horizontal").show();
                        $("#informe_propiedad_horizontal_id").val(
                            response.avaluo.propiedad_horizontal_id
                        );
                    } else {
                        $("#section_propiedad_horizontal").hide();
                    }

                    $("#conjunto_cerrado").val(
                        response.avaluo.conjunto_cerrado
                    );
                    $("#ubicacion_inmueble").val(
                        response.avaluo.ubicacion_inmueble
                    );
                    $("#numero_edificios").val(
                        response.avaluo.numero_edificios
                    );
                    $("#unidades_por_piso").val(
                        response.avaluo.unidades_por_piso
                    );
                    $("#total_unidades").val(response.avaluo.total_unidades);
                    $("#total_garajes").val(response.avaluo.total_garajes);
                    $("#total_garajes_comunales").val(
                        response.avaluo.total_garajes_comunales
                    );
                    $("#garajes_cubiertos").val(
                        response.avaluo.garajes_cubiertos
                    );
                    $("#garajes_descubiertos").val(
                        response.avaluo.garajes_descubiertos
                    );
                    $("#total_garajes_servidumbre_comunales").val(
                        response.avaluo.total_garajes_servidumbre_comunales
                    );
                    $("#garaje_sencillo").val(response.avaluo.garaje_sencillo);
                    $("#garaje_doble").val(response.avaluo.garaje_doble);
                    $("#total_depositos").val(response.avaluo.total_depositos);
                    $("#observaciones").val(response.avaluo.observaciones);
                },
                failure: function (response) {},
                error: function (response) {},
                timeout: 100000,
            });
        });
});
//Fin cargar informe

//Enviar informe
$(function (event) {
    $("#btn_enviar_iforme")
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
                        detalle_documentos_suministrados =
                            detalle_documentos_suministrados +
                            "," +
                            field.value;
                    }
                    data[field.name] = detalle_documentos_suministrados;
                } else if (field.name == "detalle_servicios_sector") {
                    if (detalle_servicios_sector == "") {
                        detalle_servicios_sector = field.value;
                    } else {
                        detalle_servicios_sector =
                            detalle_servicios_sector + "," + field.value;
                    }
                    data[field.name] = detalle_servicios_sector;
                } else if (field.name == "detalle_servicios_predio") {
                    if (detalle_servicios_predio == "") {
                        detalle_servicios_predio = field.value;
                    } else {
                        detalle_servicios_predio =
                            detalle_servicios_predio + "," + field.value;
                    }
                    data[field.name] = detalle_servicios_predio;
                } else if (field.name == "detalle_servicios_contador") {
                    if (detalle_servicios_contador == "") {
                        detalle_servicios_contador = field.value;
                    } else {
                        detalle_servicios_contador =
                            detalle_servicios_contador + "," + field.value;
                    }
                    data[field.name] = detalle_servicios_contador;
                } else if (field.name == "detalle_dotacion_comunal") {
                    if (detalle_dotacion_comunal == "") {
                        detalle_dotacion_comunal = field.value;
                    } else {
                        detalle_dotacion_comunal =
                            detalle_dotacion_comunal + "," + field.value;
                    }
                    data[field.name] = detalle_dotacion_comunal;
                } else {
                    data[field.name] = field.value;
                }
            });

            $.ajax({
                type: "POST",
                url: "areas/informeAvaluo/control",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify({
                    _token: _token,
                    data: data,
                }),
                dataType: "json",
                success: function (response) {
                    swal(response.message, {
                        icon: "success",
                    }).then(function () {
                        window.location.href = "areas";
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
//fin enviar informe
