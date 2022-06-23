<?php
require_once '../vendor/autoload.php';
use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Types\Node;

$start = $_GET['startStop'];
$stop = $_GET['endStop'];
$depTime = $_GET['depTime'];

$client = ClientBuilder::create()->withDriver('bolt', 'bolt://neo4j:p9dn!N@81.169.193.56')->build();

$searchString = 'MATCH (startStop:Stop)<-[:LOCATED_AT]-(st_tu:Stoptime)-[]->(tr1:Trip)--(r1:Route),
(endStop:Stop)<-[:LOCATED_AT]-(st_ar:Stoptime)-[]->(tr2:Trip)--(r2:Route),
p1=((st_tu)-[:PRECEDES*]->(st_midway_arr:Stoptime)),
(st_midway_arr)--(midway:Stop),
(midway)--(st_midway_dep:Stoptime),
p2=((st_midway_dep)-[:PRECEDES*]->(st_ar))
WHERE st_tu.departure_time > "' . $depTime . ':00"
AND toLower(startStop.name) contains toLower("' . $start . '") 
AND toLower(endStop.name) contains toLower("' . $stop . '")
AND st_midway_arr.arrival_time > st_tu.departure_time
AND st_midway_dep.departure_time > st_midway_arr.arrival_time
AND st_ar.arrival_time > st_midway_dep.departure_time
WITH * ORDER BY st_midway_dep.departure_time LIMIT 1
WITH *, nodes(p1) as zeiten1, nodes(p2) as zeiten2
UNWIND zeiten1 as z1
MATCH (r1:Route)--(t1:Trip)--(z1)--(s1:Stop)
UNWIND zeiten2 as z2
MATCH (r2:Route)--(t2:Trip)--(z2)--(s2:Stop)
RETURN collect(DISTINCT (s1)--(z1)--(t1)--(r1)) + collect(DISTINCT (s2)--(z2)--(t2)--(r2)) AS route';

try {
    $result = $client->run($searchString);
} catch (Exception $e) {
    $result = ["Timeout error" => $e->getMessage()];
}

echo json_encode($result);
