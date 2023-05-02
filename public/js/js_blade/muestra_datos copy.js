

//clean inputs
//Limpia los campos que fueron cargados con informacion al editar
$(function (event) {
    $(".clear").click(function () {
        $(".campos").val("");
    });
});


$(function (event) {
    $(document).ready(function () {
        document.getElementById('card_filtros').style.display = 'none';
        $("#alerta").hide(); 
    });
});

$(function (event) {
    const ocultar = document.getElementById('btn_filtros');
    ocultar.addEventListener('click', () => {
        let filtros = document.getElementById('card_filtros');
        let currentDisplay = filtros.style.display;
        if (currentDisplay === 'block') {
            filtros.style.display = 'none';
        } else {
            filtros.style.display = 'block';
        }
    })
});



//let map = L.map('mi_mapa').setView([6.680038, -74.054954], 12) 

$(document).ready(function () {
    $("#btn_poligonos").click(function () {
        console.log("entre a poligonos");
        $("#card_filtros").hide();
       // alert("si llega");
        $.ajax({
            type: "GET",
            url: "consultas/muestraDatos",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                console.log(data[0]);

                //variable local del metodo
                let map = L.map('mi_mapa').setView([6.680038, -74.054954], 12)
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position) => {
                  
                        const coords = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                            
                        };
                        
                        const miUbicacion = L.marker([coords.lat, coords.lng], { draggable: true }).addTo(map).bindPopup("mi Ubicación").openPopup();
                        //console.log(data);
                        map.flyTo([miUbicacion.getLatLng().lat, miUbicacion.getLatLng().lng]);
                        //map.fitBounds([miUbicacion.getLatLng().lat, miUbicacion.getLatLng().lng]);

                    }, () => {
                        alert("todo bien .. pero no se concedio permiso");
                    });

                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    // implementacion de leaftlet draw//
                    
                    /*var drawControl = new L.Control.Draw();
                    map.addControl(drawControl);*/

                    // crera grupo de marcadores

                  /*  let markers = L.MarkerClusterGroup();
                    markers.addLayers(L.marker(getRandomLatLng(map)));*/

                    // aqui muestra todos los marcadores
                   /* for (i = 0; i < data.length; i++) {
                        const miDato = L.marker([data[i]['latitud'], data[i]['longitud']]).addTo(map);

                    }*/

//   tratar de dibujar polilinea
                    let clickMap = 0;
                    var polyline = new L.Polyline([]).addTo(map);
                    var polygon = new L.Polygon([]).addTo(map);
                   
                    datos = [];
                   

                    // Handle map click event
                   
                    map.on('click', function (event) {
                        // Add coordinate to the polyline
                        //polyline.addLatLng(event.latlng).addTo(map);
                        if (clickMap === 0) {
                            //alert("estoy empezando");
                            map.removeLayer(polygon);
                            map.removeLayer(polyline);
                           
                            //var polyline = new L.Polyline([]).addTo(map);
                            
                        }
                        datos.push(event.latlng);
                        clickMap += 1;
                        //console.log(clickMap);
                       // console.log(datos[0]);
                        polyline.addLatLng(event.latlng).addTo(map);
                       //L.polyline(datos, { color: 'green', weight: 5 }).addTo(map);
                        /*if (clickMap === 2) {
                            map.removeLayer(polygon);
                            //polyline.addLatLng(event.latlng).addTo(map);
                            //polyline(datos, {color:'green',weight:5}).addTo(map);
                        }*/
                       
                        /*if (datos.length == 1) {
                            map.removeLayer(polyline);
                           
                            map.removeLayer(polygon);
                        }*/
                        /*if (datos.length == 3) {
                            console.log("podria dibujar");
                            polygon = L.polygon(datos).addTo(map);
                        }*/
                        /*if (datos.length >=3) {
                            console.log(datos.length);
                                map.removeLayer(polygon);
                                polygon = L.polygon(datos).addTo(map);
                        }   */
                    });

                    

                    map.on('dblclick', function (event) {
                        //map.removeLayer(polygon);
                      
                        polygon = L.polygon(datos, { color: 'green' }).addTo(map);
                        //misDatos = [];
                        const imagenCasa = "https://metrocuadrado.blob.core.windows.net/inmuebles/15740-M4198417/15740-M4198417_1_p.jpg"
                        /*for (var i = 0; i < misDatos.length; i++) {
                            map.removeLayer(misDatos[i]);
                        }*/
                       let  resultado = 0;
                    

                        for (i = 0; i < data.length; i++) {
                            const miDato = L.marker([data[i]['latitud'], data[i]['longitud']])
                            if (polygon.contains(miDato.getLatLng())) {
                                let valor = data[i]['valor_oferta'];
                                const options2 = { style: 'currency', currency: 'USD' };
                                const numberFormat2 = new Intl.NumberFormat('en-US', options2);
                                L.marker([data[i]['latitud'], data[i]['longitud']]).addTo(map).bindTooltip(`<h7> Valor </h7>` + numberFormat2.format(valor)).bindPopup(
                                    `<h4 class="title_popup">Valorar - AppSys</h4><h7>Fecha : </h7>` + data[i]['fecha_avaluo'] + `<h7>   Código </h7>` + data[i]['codigo'] + `<img src="${imagenCasa}" /><p>Esta es una imagen de prueba- Apartamento - debe ser propia </p>
                                    <p> ` + data[i]['municipio_nombre'] + ` - ` + `Barrio ` + data[i]['barrio'] + ` - ` + data[i]['tipo_nombre'] + `</p >                                    
                                    <h7> Area Terreno </h7>` + data[i]['area_terreno'] + ` m²` + ` - ` +
                                    `<h7> Area Privada </h7>` + data[i]['area_privada'] + ` m² <h7></h7>
                                    <h7> - Valor </h7> ` + numberFormat2.format(valor) +
                                    `<h7> Habitaciones </h7>` + data[i]['habitaciones'] +
                                    `<h7> - Baños </h7>` + data[i]['banos'] +
                                    `<h7> - Garajes </h7>` +
                                    data[i]['parqueaderos']);
                                resultado = resultado + 1;
                            }
                            
                        }
                       
                             $("#alerta").text("se encontraron" + " " + resultado + " " + "datos");
                             $("#alerta").fadeTo(1500, 500).slideUp(500, function () {     
                             $("#alerta").slideUp(500);  
                            });
                        
                        map.removeLayer(polyline);
                     
                        datos.length=0;
                        clickMap = 0;
                    });


// establecer el poligo de limite
                    /*var polygon = L.polygon(datos).addTo(map);*/
                    
                   /* var polygon = L.polygon([
                        [4.56666, -74.11666],
                        [4.6555, -73.9],
                        [4.878, -74.11]
                    ]).addTo(map);*/
// se comprueba si esta dentro del poligono y se adiciona
                    for (i = 0; i < data.length; i++) {
                        const miDato = L.marker([data[i]['latitud'], data[i]['longitud']])
                     if (polygon.contains(miDato.getLatLng())) {
                         L.marker([data[i]['latitud'], data[i]['longitud']]).addTo(map).bindPopup(`<h5>id</h5>` + data[i]['id'] + `<h5>valor</h5>` + data[i]['valor_oferta']);
                      }
                    }
                } else {

                    alert("El navegador no permite la geolocalizacion");
                }
            },
            failure: function (response) {
                console.log("failure");
            },
            error: function (response) {
                console.log("error");
            },
        })
    });
});

/*$(document).ready(function () {
    $("#btn_filtros").click(function () {
        console.log("entre a filtros");
        let dpto = $("#id_departamento").val();
        let mpio = $("#id_municipio").val();
        let barrio = $("#barrio").val();
        console.log(barrio);
        let tipo = $("#id_tipo_inmueble").val();

        let areaconstruida = $("#areaCons").val();
        let areaprivada = $("#areaPriv").val();
      
        let edad = $("#edad").val();
        let estrato = $("#estrato").val();
        let parqueaderos = $("#parqueaderos").val();
        let habitaciones = $("#habitaciones").val();
        let banos = $("#banos").val();
        console.log(parqueaderos);
        console.log(areaconstruida);
    });
});*/

$(document).ready(function () {
    $("#btn_consultas").click(function () {
       
        let _token = $("._token").val(); 
        var str = $("#form_filtros").serializeArray();
        //console.log(str);

        var data = new Object();
        jQuery.each(str, function (i, field) {

            data[field.name] = field.value;
        
        });
        //console.log(data);
        $("#card_filtros").hide();
        // alert("si llega");
        $.ajax({
            type: "POST",
            url: "consultas/filtraDatos",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: JSON.stringify({
                _token: _token,
                data
            }),
            success: function (data) {

                let map = L.map('mi_mapa').setView([6.680038, -74.054954], 12)
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position) => {
                        const coords = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,

                        };
                        const miUbicacion = L.marker([coords.lat, coords.lng], { draggable: true }).addTo(map).bindPopup("mi Ubicación").openPopup();
                        //console.log(data);
                        map.flyTo([miUbicacion.getLatLng().lat, miUbicacion.getLatLng().lng]);
                        //map.fitBounds([miUbicacion.getLatLng().lat, miUbicacion.getLatLng().lng]);

                    }, () => {
                        alert("todo bien .. pero no se concedio permiso");
                    });

                  /* L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);*/

                    /*var Esri_WorldStreetMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
                    }).addTo(map);*/

                    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                    }).addTo(map);


                    const imagenCasa = "https://metrocuadrado.blob.core.windows.net/inmuebles/15740-M4198417/15740-M4198417_1_p.jpg"
                  
                    for (i = 0; i < data.length; i++) {
                        let valor = data[i]['valor_oferta'];
                        const options2 = { style: 'currency', currency: 'USD' };
                        const numberFormat2 = new Intl.NumberFormat('en-US', options2);
                        const miDato = L.marker([data[i]['latitud'], data[i]['longitud']]).addTo(map).bindTooltip(`<h7> Valor </h7>` + numberFormat2.format(valor)).bindPopup(
                            `<h4 class="title_popup">Valorar - AppSys</h4><h7>Fecha : </h7>` + data[i]['fecha_avaluo'] + `<h7>   Código </h7>` + data[i]['codigo'] + `<img src="${imagenCasa}" /><p>Esta es una imagen de prueba- Apartamento - debe ser propia </p>
                                    <p> ` + data[i]['municipio_nombre']+ ` - ` + `Barrio ` + data[i]['barrio'] + ` - ` + data[i]['tipo_nombre'] + `</p >                                    
                                    <h7> Area Terreno </h7>` + data[i]['area_terreno'] + ` m²` + ` - ` +
                            `<h7> Area Privada </h7>` + data[i]['area_privada'] + ` m² <h7></h7>
                                    <h7> - Valor </h7> ` + numberFormat2.format(valor) +
                            `<h7> Habitaciones </h7>` + data[i]['habitaciones'] +
                            `<h7> - Baños </h7>` + data[i]['banos'] +
                            `<h7> - Garajes </h7>` +
                            data[i]['parqueaderos']);
                    }
                    
                    //map.fitBounds([]);

                 
                    $("#alerta").text("se encontraron" + " " + data.length + " " + "datos");
                    $("#alerta").fadeTo(1500, 500).slideUp(500, function () {     
                        $("#alerta").slideUp(500);  
                    });
                        
                   

                    //$("#alert").text("se encontraron" + " " + data.length + " " + "datos");
                    //$('.alert').alert("se encontraron cosas");


                } else {

                    alert("El navegador no permite la geolocalizacion");
                   
                }
            },
            failure: function (response) {
                console.log("failure");
            },
            error: function (response) {
                console.log("error");
            },
        })
    });
});

$(document).ready(function () {
    $("#btn_limpiar").click(function () {
        
        $(".clear").click(function () {
            $(".campos").val("");
            $(".campos").text("");
            //TODO: asegurarme que los check se limpien cuando se cargue el formulario de nuevo
            document.querySelector('.campos').checked = false;
        });
        
        map = L.map('mi_mapa').setView([6.680038, -74.054954], 12)
        
         if (navigator.geolocation) {
             navigator.geolocation.getCurrentPosition((position) => {
                 const coords = {
                     lat: position.coords.latitude,
                     lng: position.coords.longitude,
                 };
                 
                 const miUbicacion = L.marker([coords.lat, coords.lng], { draggable: true }).addTo(map).bindPopup("mi Ubicación").openPopup();
                 map.flyTo([miUbicacion.getLatLng().lat, miUbicacion.getLatLng().lng]);
                 L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                 }).addTo(map);
             });   
             
        };
    });
    
});



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

    $.ajax({
        type: "GET",
        url: "consultas/filtraDatos/municipio/barrio/"+ data.id,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
            $("#barrio").prop("disabled", false);
            console.log(data);
            
            data.forEach(element =>
                $("#barrio").append("<option value='" + element.barrio + "'>" + element.barrio + "</option>")
                //console.log(element)
            );

            for (var i = 0; i < data; i++) {

                var barrio = data[i]['barrio'];
                console.log(barrio)
                $("#barrio").append("<option value='" + data.barrio + "'>" + data.barrio + "</option>");
            }
            
        },
        failure: function (response) {
            console.log("failure");
        },
        error: function (response) {
            console.log("error");
        },
    })

    
});


//typeHead Sector
$(".typeahead_sector").typeahead({
    hint: true,
    highlight: true,
    minLength: 0
}, {
    name: "Sectores",
    display: "barrio",
    limit: 20,
    source: function (query, syncResults, asyncResults) {
        return $.get(
            'historicos_valorar', {
            query: query,
        },
            function (data) {
                return asyncResults(data);
            }
        );
    },
});
$(".typeahead_sector").bind("typeahead:select", function (ev, data) {
    $("#id_sector").val(data.id);
});






