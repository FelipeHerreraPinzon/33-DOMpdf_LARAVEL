




let map = L.map('mi_mapa').setView([6.680038, -74.054954], 12)
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition((position) => {
        const coords = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
        };
        const miUbicacion = L.marker([coords.lat, coords.lng], { draggable: true }).addTo(map).bindPopup("mi Ubicación");
        //console.log(miUbicacion.getLatLng().lat);
        map.flyTo([miUbicacion.getLatLng().lat, miUbicacion.getLatLng().lng]);
        //map.fitBounds([miUbicacion.getLatLng().lat, miUbicacion.getLatLng().lng]);

        },() => {
            //alert("todo bien .. pero no se concedio permiso");
    });



    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


    //const otroPunto = L.marker([4.680038, -74.054954], { draggable: true }).addTo(map).bindPopup("Oficinas Valorar")
    //L.marker([19.4349, -99.1313]).addTo(map).bindPopup("Templo Mayor")

    map.on('dblclick', onMapClick)



    function onMapClick(click) {
        var coordenada = click.latlng;
        var latitud = coordenada.lat; // lat  es una propiedad de latlng
        var longitud = coordenada.lng; // lng también es una propiedad de latlng
        //alert("Acabas de hacer clic en: \n latitud: " + latitud + "\n longitud: " + longitud);
        const miPunto = L.marker([latitud, longitud], { draggable: true }).addTo(map).bindPopup("Mi punto")

        $("#latitud").val(latitud);
        $("#longitud").val(longitud);

        /* miPunto.on('click', function (ev) {
             var latlng = map.mouseEventToLatLng(ev.originalEvent);
             console.log(latlng.lat + ', ' + latlng.lng);
         });*/

        miPunto.on('moveend', function (ev) {
            console.log(miPunto.getLatLng());
            $("#latitud").val(miPunto.getLatLng().lat);
            $("#longitud").val(miPunto.getLatLng().lng);
        });



    };


    /* miPunto.on('moveend', function (ev) {
         console.log(miPunto.getLatLng());
     });*/


    //otroPunto.on("movestart", ()=> console.log("moviendome"));
    //otroPunto.on("moveend", () => map.removeLayer(otroPunto));

} else {

    alert("El navegador no permite la geolocalizacion");
}
