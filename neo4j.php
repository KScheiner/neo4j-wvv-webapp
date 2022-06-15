<?php
require_once 'vendor/autoload.php';
use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Types\Node;

$client = ClientBuilder::create()->withDriver('default', 'bolt://neo4j:p9dn!N@81.169.193.56')->build();
/** @noinspection PhpParamsInspection */
$result = $client->run('MATCH (startStop:Stop)<-[*]-(dt:Stoptime)-[*]->(t:Trip)<-[*]-(at:Stoptime)-[*]->(endStop:Stop)
WHERE startStop.name starts with "Busba"
    AND endStop.name starts with "Fachhoch"
        AND dt.departure_time > "07:00:00"
        AND at.departure_time < "08:30:00"
        AND dt.stop_sequence < at.stop_sequence
WITH dt, at LIMIT 1
MATCH times= allshortestpaths((dt)-[*]->(at))
WITH nodes(times) as to
UNWIND to as t
MATCH (t)--(s:Stop)
Match (t)--(r:Trip)
MATCH (r)--(q:Route)
RETURN t, s, r, q');

foreach($result as $r) {
    /** @var Node $node */
    $node = $r->get('t');
    $stop = $r->get('s');
    echo $node->getProperty("arrival_time") ;
    echo $stop->getProperty("name"). " " . $stop->getProperty("lat") . " " . $stop->getProperty("lon") . "<br>";
}
