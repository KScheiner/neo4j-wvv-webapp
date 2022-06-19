<!DOCTYPE html>
<html>
<head>
    <title>WVV - Neo4j</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
</head>
<body>



    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/Neo4j-logo_color.png" style = "height: 80px;width: 200px">

    <h3> description</h3>

    <p>
        <input type="text" placeholder="Start" id="startStop" name="startStop">
        <input type="text" placeholder="Ziel" id="endStop" name="endStop">
        <input type="button" onclick="onSearch()" value="Suche">
    </p>





    </p>

    <hr>
    <h3>Ausgabe</h3>
    <div id="detailRoute"></div>


    <hr>
<h3>Mapbox Demo</h3>
<!--The div element for the map -->
<div id="map" style="width: 900px; height: 450px;border-radius: 20px"></div>
<script src="js/main.js"></script>
</body>
</html>