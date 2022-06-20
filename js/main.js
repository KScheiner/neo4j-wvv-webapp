mapboxgl.accessToken = 'pk.eyJ1Ijoia3NjaGVpbmVyIiwiYSI6ImNsNDQ2MzdoNjE4aWQza282ZGd5aGp0aHkifQ.frreCUcE6lM8RVECxIl7oA';
const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [9.940959, 49.789856], // starting position [lng, lat]
    zoom: 12 // starting zoom
});

let globalMarkers = [];

function  onSearch() {
    globalMarkers.forEach(element => {
        element.remove();
    });
    globalMarkers = [];
    let container = document.getElementById('detailRoute');
    container.innerHTML = "";
    console.log("Search");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            let result = JSON.parse(this.responseText);
            console.log(result);
            result = result.result[0].route;
            result.forEach(element => {
                element = element[0].nodes;
                console.log(element);
                let marker = new mapboxgl.Marker()
                    .setLngLat([element[0].properties.lon, element[0].properties.lat])
                    .addTo(map);
                globalMarkers.push(marker);
                let stopEntry = document.createElement("span");
                let br = document.createElement("br");
                stopEntry.innerText = element[3].properties.short_name + ": " + element[1].properties.departure_time + " " + element[0].properties.name
                let container = document.getElementById('detailRoute');
                container.appendChild(stopEntry);
                container.appendChild(br);
            })
        }
    };
    let start = document.getElementById('startStop').value;
    let stop = document.getElementById('endStop').value;
    let route = document.getElementById('Route');
    let departure = document.getElementById('departTime');


    console.log(start + " " + stop);
    if(route.value === 'direct'){
        xhttp.open("GET", "../php/direct.php?startStop=" + start + "&endStop=" + stop + "&depTime=" + departure.value, true);
        xhttp.send();
    }

    if(route.value === 'indirect'){
        xhttp.open("GET", "../php/indirect.php?startStop=" + start + "&endStop=" + stop + "&depTime=" + departure.value, true);
        xhttp.send();
    }

}