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

<p>Eingabefeld(Start)
    <br>Eingabefeld(Ziel)
    <br>Eingabefeld(Uhrzeit)</p>

<p><a>
    <button>Suchen</button>
    </a>



</p>

<hr>
<h3>Ausgabe</h3>

<?php
include ("neo4j.php")?>




<hr>
<h3>Map</h3>
<!--The div element for the map -->
<div id="map" style="width: 900px; height: 450px;border-radius: 20px"></div>
<script src="map.js"></script>
</body>
</html>