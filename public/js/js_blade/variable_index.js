//Limpia los campos que fueron cargados con informacion al editar
$(function (event) {
    $(document).ready(function () {
        $('.custom-select').select2();
    });
});


$(function (event) {
    $(".clear").click(function () {
        $(".campos").val("");
        $(".campos").text("");
    });
});



//esta modal se despliega al dar click en crear o editar, si es editar carga una funcion ajax con la informacion del dato
$(function (event) {
    $("#modalVariable")
        .off()
        .on("show.bs.modal", function (e) {

            let option = $(e.relatedTarget).data("option");
            let id = $(e.relatedTarget).data("id");
          
            $("#variable_id").val(id);
            $("#option_select").val(option);
            if (option == "create") {
                $("#modal-title").text("Creando nueva Variable");
                $("#variable_id").val("");
                $.ajax({
                    type: "GET",
                    url: "variables/ultimoRegistro",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    async: true,
                    success: function (response) {
                        $('#numeracion').val(response.numeracion +1);
                    },
                    failure: function (response) { },
                    error: function (response) { },
                    timeout: 100000,
                });
                return;
            }
            if (option == "update") {
                $.ajax({
                    type: "GET",
                    url: "variables/" + id,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    async: true,
                    success: function (response) {
                        //console.log(reponse);
                        $('#variable_id').val(response[0].id);
                        $('#numeracion').val(response[0].numeracion),
                        $("#nombre").val(response[0].nombre);
                        $("#descripcion").val(response[0].descripcion);
                        $("#modal-title").text("Modificando datos de la Variable :  " + " " + response[0].nombre);
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
            let id = $("#variable_id").val();
            let numeracion = $('#numeracion').val();
            let nombre = $("#nombre").val();
            let descripcion = $("#descripcion").val();
            let option = $("#option_select").val();

            /*
             *Funciona Ajax actualizar o crear
             */
            $.ajax({
                type: "POST",
                url: "variables/control",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify({
                    _token: _token,
                    option: option,
                    id: id,
                    numeracion: numeracion,
                    nombre: nombre,
                    descripcion: descripcion,

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
            let id = $(e.currentTarget).data("variable_id");
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
                        alert("solo opción para el desarrollador - ");
                        return;
                        $.ajax({
                            type: "POST",
                            url: "variables/" + id + "/eliminarVariable",
                            contentType: "application/json; charset=utf-8",
                            data: JSON.stringify({
                                _token: _token,
                                id: id
                            }),
                            dataType: "json",
                            success: function (response) {
                                swal("La Variable ha sido eliminada!", {
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


