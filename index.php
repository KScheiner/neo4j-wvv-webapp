<!DOCTYPE html>
<html>
<head>
    <title>WVV - Neo4j</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
    <style>
        @font-face {
            font-family: "roboto";
            src: url("fonts/Roboto-Regular.ttf");
        }
        p, span, h1, h2 {
            font-family: "roboto", sans-serif;
        }
        hr {
            margin: 45px;
        }
        input, select, option {
            font-size: 20px;
        }
    </style>
</head>
<body style="background-color: white; padding: 0 20%;margin: 0; font-size: 20px">
<div style="background-color: aliceblue">

<div style=" background-image: url(https://www.wvv.de/media-wvv/mobilitaet/bilder/bus-und-strassenbahn/wvv_elektrobus.jpg);background-repeat: no-repeat; height: 400px; background-size: cover; background-position: center">
    <img src="https://legalhelper.eu/ccm19/public/logo/5c5986e/bdf04a6/968e274" style="text-align:left; padding-left: 10px; height: 90px; width: 190px">

</div>

      <h1 style="text-align: center "><u>Fahrplan</u></h1>

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
    <h2 style="text-align: center;" ><u>Haltestellen</u></h2>
    <div id="detailRoute" style="min-height: 25px;height: auto; margin-left: auto; margin-right: auto; width: 25em; border-color: darkgrey; border-width: 2px; border-style: solid; background-color: ivory"></div>
<hr>
    <h2  style="text-align: center; margin-bottom: 45px" ><u>Karte</u></h2>
    <!--The div element for the map -->
    <div id="map" style="width: 90%; height: 450px;border-radius: 20px; margin: auto"></div>
    <script src="js/main.js"></script>
</div>
</body>
</html>