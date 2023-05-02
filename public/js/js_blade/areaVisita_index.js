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
    $("#modalAreaVisita")
        .off()
        .on("show.bs.modal", function (e) {
            let option = $(e.relatedTarget).data("option");
            let id = $(e.relatedTarget).data("id");
            $("#avaluo_id").val(id);
            console.log(id);
            $("#option_select").val(option);
            if (option == "create") {
                $("#modal-title").text("deberia se crear Actualización avaluo xxxxx");
                alert("entre por create");
                return;
            }
            if (option == "update") {
                $("#modal-title").text("Actualizr avaluo XXXX:  ");
               
                $.ajax({
                    type: "GET",
                    url: "areas/" +  id,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    async: true,
                    success: function (response) {
                        $("#avaluo_id").val(response[0].id);
                        $("#fecha_visita").val(response[0].fecha_visita);
                        $("#novedades").val(response[0].novedades);
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
            let id = $("#avaluo_id").val(); 
            console.log(id);
            let fecha_visita = $("#fecha_visita").val();
            console.log(fecha_visita);
            
            let novedades = $("#novedades").val();
            console.log(novedades);
            $.ajax({
                type: "POST",
                url: "areas/control",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify({
                    _token: _token,
                    id:id,
                    fecha_visita: fecha_visita,
                    novedades: novedades,
                }),
                success: function (response) {
                    //TODO: mejorar el intervalo de tiempo
                    swal(response.message, {
                        icon: "success",
                    });
                    //navegacion a pagina despues del click en el boton de confirmacion de accion del Swal 
                    $(".swal-button--confirm").off().on("click", function (e) { window.location.href = "areas" });
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

