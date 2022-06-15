
mapboxgl.accessToken = 'pk.eyJ1Ijoia3NjaGVpbmVyIiwiYSI6ImNsNDQ2MzdoNjE4aWQza282ZGd5aGp0aHkifQ.frreCUcE6lM8RVECxIl7oA';
const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [9.940959, 49.789856], // starting position [lng, lat]
    zoom: 12 // starting zoom
});

// Create a new marker.
const marker = new mapboxgl.Marker()
    .setLngLat([9.9345765262948, 49.80078195615])
    .addTo(map);
const marker2 = new mapboxgl.Marker()
    .setLngLat([9.9459941135575, 49.792217329117 ])
    .addTo(map);