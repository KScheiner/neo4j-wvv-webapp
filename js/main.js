mapboxgl.accessToken = 'pk.eyJ1Ijoia3NjaGVpbmVyIiwiYSI6ImNsNDQ2MzdoNjE4aWQza282ZGd5aGp0aHkifQ.frreCUcE6lM8RVECxIl7oA';
const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [9.940959, 49.789856], // starting position [lng, lat]
    zoom: 12 // starting zoom
});

function onSearch() {
    console.log("Search");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let result = JSON.parse(this.responseText).result;
            result.forEach(element => {
                console.log(element.s.properties);
                new mapboxgl.Marker()
                    .setLngLat([element.s.properties.lon, element.s.properties.lat])
                    .addTo(map);

            })
        }
    };
    let start = document.getElementById('startStop').value;
    let stop = document.getElementById('endStop').value;
    console.log(start + " " + stop);
    xhttp.open("GET", "../php/direct.php?startStop=" + start + "&endStop=" + stop, true);
    xhttp.send();
}