<?php
$title='Keanu Reeves';
include("connection.php");
//$query = 'MATCH (name:Movie{title: {titlem}}) RETURN name';
//$query = 'MATCH (name: Movie {title: {titlem}})<-[r]-(p: Person) RETURN p, r, name';
//$params = ['titlem' => $title];

//$result = $connection->sendCypherQuery($query, $params)->getResult();
//echo $result->getSingleNode()->getProperty('released');
$query = 'MATCH path=(m:Movie)<-[r:ACTED_IN]-(p:Person{name:{nombre}}) RETURN path,m,p';
$params = ['nombre' => $title];
$result = $connection->sendCypherQuery($query, $params)->getResult();
$actor = $result->get('p');
$movie = $result->get('m');
echo $actor->getProperty('name').'|';
echo $actor->getProperty('born').'|';
/** 
foreach ($movie as $movieRel) {
    echo $actortheMovie['title'] = $movieRel->getProperty('title');
    echo $theMovie['released'] = $movieRel->getProperty('released');
}
*/
$movie = $actor->getRelationships('ACTED_IN');


echo 'Movies: ';
foreach ($movie as $actors) {
    echo $actors->getProperty('title') . ", " ;
}

/** 
$query = 'MATCH path=(m:Movie)<--(p:Person{name:{nombre}}) RETURN path,m,p';
$params = ['nombre' => $title];
$result = $connection->sendCypherQuery($query, $params)->getResult();
$movies = $result->get('p');
echo $movies->getProperty('name').'|';
echo $movies->getProperty('born').'|';
*/
/** 
$query = 'MATCH path=(m:Movie{title: {titlem}})<--(p:Person) RETURN path,m,p';
$params = ['titlem' => $title];
$result = $connection->sendCypherQuery($query, $params)->getResult();
$movies = $result->get('m');

echo $movies->getProperty('title').'|';
echo $movies->getProperty('released').'|';
echo $movies->getProperty('tagline').'|';

$actors = $movies->getRelationships('ACTED_IN');


echo 'Actors: ';
foreach ($actors as $actor) {
    echo $actor->getStartNode()->getProperty('name') . ", " ;
}

$directors = $movies->getRelationships('DIRECTED');

echo '</br>Directors: ';
foreach ($directors as $director) {
    echo $director->getStartNode()->getProperty('name') . ", " ;
}

$producers = $movies->getRelationships('PRODUCED');

echo '</br>Producers: ';
foreach ($producers as $producer) {
    echo $producer->getStartNode()->getProperty('name') . ", " ;
}
*/
?>