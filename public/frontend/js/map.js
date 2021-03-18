var lat = parseFloat(27.697999680391927);
var lng = parseFloat(85.31596804141532);
// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var markers = [];

function initMap() {
    // console.log(this.lat);
    // console.log(this.lng);
    var haightAshbury = {lat:this.lat , lng: this.lng};

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: haightAshbury,
        disableDoubleClickZoom: true
    });

    // This event listener will call addMarker() when the map is clicked.
    map.addListener('click', function(event) {
        addMarker(event.latLng);
        handleEvent(event);
    });

    // Adds a marker at the center of the map.
    addMarker(haightAshbury);
}

// Adds a marker to the map and push to the array.
function addMarker(location) {
    deleteMarkers();
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    setMapOnAll(null);
    markers = [];
}

function handleEvent(event) {
    document.getElementById('latitude').value = event.latLng.lat();
    document.getElementById('longitude').value =  event.latLng.lng();
}
