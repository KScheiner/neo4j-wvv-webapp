mapboxgl.accessToken = 'pk.eyJ1Ijoia3NjaGVpbmVyIiwiYSI6ImNsNDQ2MzdoNjE4aWQza282ZGd5aGp0aHkifQ.frreCUcE6lM8RVECxIl7oA';
const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [9.940959, 49.789856], // starting position [lng, lat]
    zoom: 12 // starting zoom
});

map.on('load', function () {
    map.resize();
})

let globalMarkers = [];
let start = document.getElementById('startStop').value;
let stop = document.getElementById('endStop').value;
let route = document.getElementById('Route').value;
let departure = document.getElementById('departTime').value;


function  onSearch() {
    // Remove all existing markers from map
    globalMarkers.forEach(element => {
        element.remove();
    });
    globalMarkers = [];
    // Remove all displayed stops from list and show loading spinner
    let stops = document.getElementsByClassName("stopItem");
    while(stops.length > 0) {
        stops[0].parentNode.removeChild(stops[0]);
    }
    let spinner = document.getElementById("spinnerContainer");
    spinner.style.display = "flex";

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            //console.log(this.responseText);
            let result = JSON.parse(this.responseText);

            let spinner = document.getElementById("spinnerContainer");
            spinner.style.display = "none";

            result = result.result[0].route;
            result.forEach(element => {
                element = element[0].nodes;

                let marker = new mapboxgl.Marker()
                    .setLngLat([element[0].properties.lon, element[0].properties.lat])
                    .addTo(map);
                globalMarkers.push(marker);

                let stopEntry = document.createElement("span");
                let container = document.getElementById('detailRoute');

                stopEntry.classList.add("stopItem");
                stopEntry.innerText = element[3].properties.short_name + ": " + element[1].properties.departure_time + " " + element[0].properties.name
                container.appendChild(stopEntry);
            })
        }
    };

    if(route === 'direct'){
        xhttp.open("GET", "../php/direct.php?startStop=" + start + "&endStop=" + stop + "&depTime=" + departure, true);
        xhttp.send();
    }
    if(route === 'indirect'){
        xhttp.open("GET", "../php/indirect.php?startStop=" + start + "&endStop=" + stop + "&depTime=" + departure, true);
        xhttp.send();
    }

}