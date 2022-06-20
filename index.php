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
<img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/Neo4j-logo_color.png" style = "height: 100px;width: 240px;margin 0px auto">

</p>

   <div>
    <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/Neo4j-logo_color.png" width="800" height="600"-->

    </div>


    <h1 style="text-align: center "><u>WVV-Fahrplan</u></h1>

<div style="height: 50px">

</div>

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
<div style="height:25px"></div>







    <hr>
<!--
    <form action="php/direct.php" method="get">


        <div >
            <label for="text"> <h3 style="text-align: center " >Haltestellen</h3></label>
            <textarea id="detailRoute" name="detailRoute" cols="50" rows="20"></textarea>

        </div>
    </form>
-->
<h2 style="text-align: center;" ><u>Haltestellen</u></h2>
<div id="detailRoute" style="height: auto; margin-left: auto; margin-right: auto; width: 25em; border-color: darkgrey; border-width: 2px; border-style: solid"></div>
<div style="height:25px"></div>
<hr>
<div style="height:25px"></div>
<h2  style="text-align: center " ><u>Karte</u></h2>
<!--The div element for the map -->
<div id="map" style="width: 900px; height: 450px;border-radius: 20px; margin: auto"></div>
<script src="js/main.js"></script>
</body>
</html>