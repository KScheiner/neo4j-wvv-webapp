<!DOCTYPE html>
<html>
<head>
    <title>WVV - Neo4j</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>

</head>


<body class="allgemein">

<p>
<img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/Neo4j-logo_color.png" style = "height: 80px;width: 200px;margin 0px auto">
</p>
    <p style="position:absolute;top:100px;left:350px;">
    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/Neo4j-logo_color.png" width="800" height="600"
         style="filter:alpha(opacity=25); -moz-opacity: 0.25; opacity: 0.25;">
    </p>

    <h3 style="text-align: center ">Fahrplan</h3>

    <p>
        <label for="Route">Wähle einen Routentyp:</label>
        <select id="Route" name="Route">
            <option value="direct">direkt</option>
            <option value="indirect">indirekt</option>
        </select>
    </p>

    <p>
        <label for="Route">Wähle eine Abfahrtszeit:</label>
        <input type="time" id="depart_Time" name="depart_Time">
    </p>

    <p>
        <input type="text" placeholder="Start" id="startStop" name="startStop">
        <input type="text" placeholder="Ziel" id="endStop" name="endStop">
        <input type="button" onclick="onSearch()" value="Suche">
    </p>






    <hr>
    <h3 style="text-align: center " >Haltestellen</h3>
    <div id="detailRoute"></div>


<h3  style="text-align: center " >Karte</h3>
<!--The div element for the map -->
<div id="map" style="width: 900px; height: 450px;border-radius: 20px"></div>
<script src="js/main.js"></script>
</body>
</html>