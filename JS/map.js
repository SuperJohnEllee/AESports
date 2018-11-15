
    function ae_map() {  
    var ae_location = new google.maps.LatLng(10.7357569,122.5462308);

    var ae_map_options = {
        center: ae_location,
        zoom: 15,
    };

    var ae_map = new google.maps.Map(document.getElementById("ae_map"),
        ae_map_options);

    var ae_marker = new google.maps.Marker({
        position: ae_location,
        map: ae_map,
        title: "Ariane Egida Sports",
        animation: google.maps.Animation.DROP,
    });
    ae_marker.setMap(ae_map);
}
// Initialize maps
google.maps.event.addDomListener(window, 'load', ae_map);