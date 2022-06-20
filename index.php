<!DOCTYPE html>
<html>
<head>
    <title>WVV - Neo4j</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
<!--
    <style>
    .backround{
        height: 100vh;
        background-image:url(https://upload.wikimedia.org/wikipedia/commons/e/e5/Neo4j-logo_color.png);
        background-repeat: no-repeat;
        background-position: center;
        background-size: 1300px;
        filter: alpha(opacity=25);
       background: -moz-opacity: 0.25;

    }


    </style>
-->
</head>


<body style="background-color: aliceblue">



<p>
<img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/Neo4j-logo_color.png" style = "height: 80px;width: 200px;margin 0px auto">

</p>

   <div>
    <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/Neo4j-logo_color.png" width="800" height="600"-->

    </div>


    <h3 style="text-align: center ">Fahrplan</h3>

    <p style="text-align: center">
        <label for="Route">Wähle einen Routentyp:</label>
        <select id="Route" name="Route">
            <option value="direct">direkt</option>
            <option value="indirect">indirekt</option>
        </select>
    </p>

    <p style="text-align: center">
        <label for="Route">Wähle eine Abfahrtszeit:</label>
        <input type="time" id="departTime" name="departTime">
    </p>

    <p style="text-align: center">
        <input type="text" placeholder="Start" id="startStop" name="startStop">
        <input type="text" placeholder="Ziel" id="endStop" name="endStop">
        <input type="button" onclick="onSearch()" value="Suche">
    </p>






    <hr>
<!--
    <form action="php/direct.php" method="get">


        <div >
            <label for="text"> <h3 style="text-align: center " >Haltestellen</h3></label>
            <textarea id="detailRoute" name="detailRoute" cols="50" rows="20"></textarea>

        </div>
    </form>
-->
<h3 style="text-align: center " >Haltestellen</h3>
<div id="detailRoute" style="height: auto; margin-left: auto; margin-right: auto; width: 15em"></div>

<hr>
<h3  style="text-align: center " >Karte</h3>
<!--The div element for the map -->
<div id="map" style="width: 900px; height: 450px;border-radius: 20px; margin: auto"></div>
<script src="js/main.js"></script>
</body>
</html>