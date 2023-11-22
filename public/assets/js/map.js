function initMap() {
    // Your existing map initialization code here
    mapboxgl.accessToken =
        "pk.eyJ1Ijoid2hpdGVnZW50bGUxIiwiYSI6ImNscDg3cmg1ODBjbTQybHVqZGQ4bmRybDMifQ.QMlyosgi_DqfSU5s7OSnnQ";
    navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
        enableHighAccuracy: true,
    });
}

function successLocation(position) {
    setupMap([position.coords.longitude, position.coords.latitude]);
}

function errorLocation() {
    setupMap([14.997659646999308, 120.65479159683659]);
}

function setupMap(center) {
    const map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/whitegentle1/clp87vlff00gh01r66nceeue4",
        center: center,
        zoom: 12,
    });
    const nav = new mapboxgl.NavigationControl();
    map.addControl(nav);
    var directions = new MapboxDirections({
        accessToken: mapboxgl.accessToken,
    });
    map.addControl(directions, "top-left");
}
