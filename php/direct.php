<?php
require_once '../vendor/autoload.php';
use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Types\Node;

$start = $_GET['startStop'];
$stop = $_GET['endStop'];
$depTime = $_GET['depTime'];

$client = ClientBuilder::create()->withDriver('default', 'bolt://neo4j:p9dn!N@81.169.193.56')->build();
$result = $client->run('MATCH (startStop:Stop)<-[*]-(dt:Stoptime)-[*]->(t:Trip)<-[*]-(at:Stoptime)-[*]->(endStop:Stop)
WHERE startStop.name starts with "' . $start . '"
    AND endStop.name starts with "' . $stop . '"
        AND dt.departure_time > "' . $depTime . ':00"
        AND dt.stop_sequence < at.stop_sequence
WITH dt, at LIMIT 1
MATCH times= allshortestpaths((dt)-[*]->(at))
WITH nodes(times) as to
UNWIND to as t
MATCH (t)--(s:Stop)
Match (t)--(r:Trip)
MATCH (r)--(q:Route)
RETURN t, s, r, q');

echo json_encode($result);
