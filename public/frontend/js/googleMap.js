function initMap() {
    //     var options = {
    //         center: { lat: -34.397, lng: 150.644 },
    //         zoom: 12,
    //     };
    //     var map = new google.maps.Map(document.getElementById("map"), options);
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8,
    });

    const marker = new google.maps.Marker({
        position: { lat: 37.9922, lng: -1.1307 },
        map: map,
        icon: "https://img.icons8.com/nolan/2x/marker.png",
    });
}
