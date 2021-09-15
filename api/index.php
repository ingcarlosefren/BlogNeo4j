<?php
// Instantiate the class responsible for implementing a micro application
$app = new Phalcon\Mvc\Micro();

// Routes
$app->get('/', 'home');
$app->get('/api', 'home');	
$app->get('/api/movie/{title}', 'findMovie'); // curl -i -X GET http://host/Neo4jMovies/api/api/movie/The%20Matrix
$app->get('/api/actor/{name}', 'findActor');  // curl -i -X GET http://host/Neo4jMovies/api/api/actor/Keanu%20Reeves
$app->get('/api/filmography/{name}', 'findFilmography'); // curl -i -X GET http://host/Neo4jMovies/api/api/filmography/Keanu%20Reeves
$app->notFound('notFound');

// Handlers

// Show the use of the API
function home() {
	header('Location:../useOfTheAPI.php');
}

// Returns title, released, casting, directors and producers of the movie title passed as parameter
// Example:
// {"title":"The Matrix",
//  "released":1999,
//  "tagline":"Welcome to the Real World",
//  "cast":[
//		{"name":"Keanu Reeves","born":1964},
//		{"name":"Carrie-Anne Moss","born":1967},
//		{"name":"Laurence Fishburne","born":1961},
//		{"name":"Hugo Weaving","born":1960},
//		{"name":"Emil Eifrem","born":1978}
//	],
//	"director":[
//		{"name":"Andy Wachowski","born":1967},
//		{"name":"Lana Wachowski","born":1965}
//	],
//	"producer":[
//		{"name":"Joel Silver","born":1952}
//	]
// }
function findMovie ($title) {

	// Create the connection
	include("../connection.php");

	// Setup a query that return the movie and the path (movie-rel->person) of the movie with persons for all the relations
	/**********
	*** YOUR CODE HERE
	**********/

	$query = 'MATCH path=(m:Movie{title: {titlem}})<--(p:Person) RETURN path,m,p';
	$params = ['titlem' => $title];
	// Run the query
	/**********
	*** YOUR CODE HERE
	**********/
	$result = $connection->sendCypherQuery($query, $params)->getResult();
	// Obtain the movie nodes from the result
	/**********
	*** YOUR CODE HERE
	**********/
	$movies = $result->get('m');
	// Setup on the array of results the values of title, released and tagline of the movie
	$data['title'] =  NULL;
	$data['released'] = NULL;
	$data['tagline'] = NULL;

	/**********
	*** YOUR CODE HERE
	**********/
	$data['title'] =  $movies->getProperty('title');
	$data['released'] = $movies->getProperty('released');
	$data['tagline'] = $movies->getProperty('tagline');
	// 1. Obtaing the cast of the movie
	// Obtain the relationships ACTED_IN from the resultset
	$actorRels = $movies->getRelationships('ACTED_IN');

	// Build and array of actors iterating through the relations getting the start node properties of each relation
	foreach ($actorRels as $actorRel) {
		$theActor['name'] = $actorRel->getStartNode()->getProperty('name');
		$theActor['born'] = $actorRel->getStartNode()->getProperty('born');

		/**********
		*** YOUR CODE HERE
		**********/

		$actorsArray[] = $theActor;
	}

	// Add to the result array the obtained casting 
	$data['cast'] = $actorsArray;

	// 2. Obtaing the directors of the movie 
	// Obtain the relationships DIRECTED from the resultset
	/**********
	*** YOUR CODE HERE
	**********/
	$directors = $movies->getRelationships('DIRECTED');
	// Build and array of directors iterating through the relations getting the start node properties of each relation
	foreach ($directors as $director) {
		$theDirector['name'] = $director->getStartNode()->getProperty('name');
		$theDirector['born'] = $director->getStartNode()->getProperty('born');

		/**********
		*** YOUR CODE HERE
		**********/

		$directorsArray[] = $theDirector;
	}

	// Add to the result array the obtained directors 
	$data['director'] = $directorsArray;

	// 3. Obtaing the producers of the movie
	// Obtain the relationships PRODUCED from the resultset
	/**********
	*** YOUR CODE HERE
	**********/
	$producers = $movies->getRelationships('PRODUCED');
	// Build and array of producers iterating through the relations getting the start node properties of each relation
	foreach ($producers as $producer) {
		$theDirector['name'] = $producer->getStartNode()->getProperty('name');
		$theDirector['born'] = $producer->getStartNode()->getProperty('born');

		/**********
		*** YOUR CODE HERE
		**********/

		$producerArray[] = $theProducer;
	}

	// Add to the result array the obtained producers
	$data['producer'] = $producerArray;

	// Return the result as JSON
	echo json_encode($data);

}

// Returns name and born year of the actor passed as parameter
// Example
// {"name":"Keanu Reeves","born":1964}
function findActor ($name) {

	// Create the connection
	include("../connection.php");

	// Setup a query that return the person 
	/**********
	*** YOUR CODE HERE
	**********/
	$query = 'MATCH path=(m:Movie)<--(p:Person{name:{nombre}}) RETURN path,m,p';
	$params = ['nombre' => $name];
	// Run the query
	/**********
	*** YOUR CODE HERE
	**********/
	$result = $connection->sendCypherQuery($query, $params)->getResult();
	//Obtain the node returned by the query from the resultset
	/**********
	*** YOUR CODE HERE
	**********/
	$person = $result->get('p');
	// Add to the result array the name and the born year of the actor
	$data['name'] = $person->getProperty('name');
	$data['born'] = $person->getProperty('born');;

	/**********
	*** YOUR CODE HERE
	**********/

	// Return the result as JSON
	echo json_encode($data);

}

// Returns name, born year and filmography of the actor passed as parameter
// Example:
// {"name":"Keanu Reeves",
//	"born":1964,
//	"filmography":[
//		{"title":"The Matrix","released":1999},
//		{"title":"The Matrix Reloaded","released":2003},
//		{"title":"The Matrix Revolutions","released":2003},
//		{"title":"The Devil's Advocate","released":1997},
//		{"title":"The Replacements","released":2000},
//		{"title":"Johnny Mnemonic","released":1995},
//		{"title":"Something's Gotta Give","released":1975}
//	]
// }
function findFilmography ($name) {

	// Create the connection
	include("../connection.php");

	// Setup a query that return the movie and the path (movie-[:ACTED_IN]->person) of the movie with all its actors
	/**********
	*** YOUR CODE HERE
	**********/
	$query = 'MATCH path=(m:Movie)<-[r:ACTED_IN]-(p:Person{name:{nombre}}) RETURN path,m,p';
	$params = ['nombre' => $name];
	//Run the query and assign the result
	/**********
	*** YOUR CODE HERE
	**********/
	$result = $connection->sendCypherQuery($query, $params)->getResult();
	// Obtain the movie path from the resultset
	/**********
	*** YOUR CODE HERE
	**********/
	$movieRels = $result->get('m');
	$actor = $result->get('p');
	// Add to the result array the name and the born year of the actor
	$data['name'] = $actor->getProperty('name');
	$data['born'] = $actor->getProperty('born');

	/**********
	*** YOUR CODE HERE
	**********/

	// Obtain the relationships ACTED_IN from the resultset
	/**********
	*** YOUR CODE HERE
	**********/

	// Build and array of movies iterating through the relations getting the end node properties of each relation
	foreach ($movieRels as $movieRel) {
		$theMovie['title'] = $movieRel->getProperty('title');
		$theMovie['released'] = $movieRel->getProperty('released');

		/**********
		*** YOUR CODE HERE
		**********/

		$movieArray[] = $theMovie;
	}

	// Add to the result array the set of obtained movies
	$data['filmography'] = $movieArray;

	// Return the result as JSON
	echo json_encode($data);

}


function notFound() {
	home();
}

// Handle the request
$app->handle();
?>

