<?php
require_once '../vendor/autoload.php';
use Laudis\Neo4j\ClientBuilder;

$start = $_GET['startStop'];
$stop = $_GET['endStop'];
$depTime = $_GET['depTime'];

$client = ClientBuilder::create()->withDriver('bolt', 'bolt://neo4j:p9dn!N@81.169.193.56')->build();

$searchString='MATCH (startStop:Stop)<-[:LOCATED_AT]-(dt:Stoptime)-[*]->(trip:Trip)<-[*]-(at:Stoptime)-[:LOCATED_AT]->(endStop:Stop)
WHERE toLower(startStop.name) contains toLower("' . $start . '") 
    AND toLower(endStop.name) contains toLower("' . $stop . '")
        AND dt.departure_time > "' . $depTime . ':00"
        AND dt.stop_sequence < at.stop_sequence
WITH * ORDER BY dt.departure_time LIMIT 5
MATCH times = allshortestpaths((dt)-[*..30]->(at))
WITH *, nodes(times) as to
UNWIND to as t
MATCH (t)--(s:Stop)
MATCH (trip)--(r:Route)
RETURN collect(DISTINCT (s)--(t)--(trip)--(r)) AS route';

$result = $client->run($searchString);

echo json_encode($result);
