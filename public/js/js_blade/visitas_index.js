//clean inputs
$(function (event) {
    $(".clear").click(function () {
        $(".campos").val("");
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
                return;
            }
            if (option == "update") {
                $("#modal-title").text("Editar Visita");

                $.ajax({
                    type: "GET",
                    url: "radicados/" + template,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    async: true,
                    success: function (response) {
                        $("#numradicado").val(response[0].numradicado);
                        $("#fecha").val(response[0].fecha);
                        $("#hora").val(response[0].hora);
                        $("#referente_id").val(response[0].referente_id);
                        $("#tipoinmueble_id").val(response[0].tipoinmueble_id);
                        $("#direccion").val(response[0].direccion);
                        $("#barrio").val(response[0].barrio);
                        $("#zona").val(response[0].zona);
                        $("#municipio").val(response[0].municipio);
                        $("#departamento").val(response[0].departamento);
                        $("#persona_id").val(response[0].persona_id);
                        $("#solicitante_id").val(response[0].solicitante_id);
                        $("#contacto_id").val(response[0].contacto_id);
                        $("#vrreferente").val(response[0].vrreferente);
                        $("#honorarios").val(response[0].honorarios);
                        $("#observaciones").val(response[0].observaciones);
                    },
                    failure: function (response) {},
                    error: function (response) {},
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
            let numradicado = $("#numradicado").val();
            let fecha = $("#fecha").val();
            let hora = $("#hora").val();
            let referente = $("#referente_id").val();
            let tipoinmueble = $("#tipoinmueble_id").val();
            let direccion = $("#direccion").val();
            let barrio = $("#barrio").val();
            let zona = $("#zona").val();
            let municipio = $("#municipio").val();
            let departamento = $("#departamento").val();
            let persona = $("#persona_id").val();
            let solicitante = $("#solicitante_id").val();
            let contacto = $("#contacto_id").val();
            let vrreferente = $("#vrreferente").val();
            let honorarios = $("#honorarios").val();
            let observaciones = $("#observaciones").val();
            alert(_token);

            let option = $("#option_select").val();
            let id = $("#id").val();
            let name = $("#name").val();
            let subject = $("#subject").val();
            let content_ = $("#content_").val();
            console.log(content_);
            if (name == "" || subject == "" || content_ == "") {
                swal("fields are missing", {
                    icon: "error",
                    buttons: {
                        confirm: {
                            className: "btn btn-danger",
                        },
                    },
                });
                return;
            }

            $.ajax({
                type: "GET",
                url: "radicados/create" ,
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify({
                    _token: _token,
                    option: option,

                    numradicado,
                    fecha: fecha,
                    hora: hora,
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
                    swal(response.message + "", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    }).then((navigate) => {
                        window.location.href = "adminMailTemplate";
                    });
                },
                failure: function (response) {
                    swal(xhr.responseJSON.message + "", {
                        icon: "error",
                        buttons: {
                            confirm: {
                                className: "btn btn-danger",
                            },
                        },
                    });
                },
                error: function (response) {},
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
                        afterSelect: function () {},
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
