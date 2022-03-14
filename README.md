# Aplicación PHP para Neo4j sobre la base de datos *Movies*

Este es el repositorio con el contenido base para desarrollar la aplicación.

## Requisitos

* [Framework Phalcon](https://phalconphp.com) (Framework PHP)
* [NeoClient](https://github.com/neoxygen/neo4j-neoclient) (Driver PHP para Neo4j) **ATENCION: Instalar la versión indicada de Neoxygen. No instalar la versión actual de GraphAware aunque sea lo indicado** 
* [Movies Database](https://github.com/ualmtorres/SampleDatabases/tree/master/Movies) (by Neo4j.com)

## Funcionalidad

La aplicación permite mostrar:

* Datos de una película: Título, año de producción y resumen.
* Datos personales de un actor: Nombre y año de nacimiento.
* Filmografía de un actor: Lista de películas con su título y año de producción.

Para ello, la aplicación se basa en una API REST que devuelve datos en JSON. La API REST permite lo siguiente:

Method | URL | Description | Use
--- | --- | --- | ---
GET | `/api/movie/{title}` | Devuelve título, año de producción, casting, director y productor de la película proporcionada | `curl -i -X GET http://host/Neo4jMovies/api/api/movie/The%20Matrix`
GET | `/api/actor/{name}` | Devuelve nombre y año de nacimiento del actor proporcionado | `curl -i -X GET http://host/Neo4jMovies/api/api/actor/Keanu%20Reeves`
GET | `/api/filmography/{name}` | Devuelve nombre, año de namimiento y la filmografía del actor proporcionado | `curl -i -X GET http://host/Neo4jMovies/api/api/filmography/Keanu%20Reeves`

## Ejemplos devueltos por la API REST

### Información de una película

```
http://host/Neo4jMovies/api/api/movie/The%20Matrix

  {"title":"The Matrix",
   "released":1999,
   "tagline":"Welcome to the Real World",
   "cast":[
 		{"name":"Keanu Reeves","born":1964},
 		{"name":"Carrie-Anne Moss","born":1967},
 		{"name":"Laurence Fishburne","born":1961},
 		{"name":"Hugo Weaving","born":1960},
 		{"name":"Emil Eifrem","born":1978}
 	],
 	"director":[
 		{"name":"Andy Wachowski","born":1967},
 		{"name":"Lana Wachowski","born":1965}
 	],
 	"producer":[
 		{"name":"Joel Silver","born":1952}
 	]
  }
```

### Información de un actor

```
http://host/Neo4jMovies/api/api/actor/Keanu%20Reeves

  {"name":"Keanu Reeves",
 	"born":1964
  }
```

### Filmografía de un actor

```
http://host/Neo4jMovies/api/api/filmography/Keanu%20Reeves

  {"name":"Keanu Reeves",
 	"born":1964,
 	"filmography":[
 		{"title":"The Matrix","released":1999},
 		{"title":"The Matrix Reloaded","released":2003},
 		{"title":"The Matrix Revolutions","released":2003},
 		{"title":"The Devil's Advocate","released":1997},
 		{"title":"The Replacements","released":2000},
 		{"title":"Johnny Mnemonic","released":1995},
 		{"title":"Something's Gotta Give","released":1975}
 	]
  }
```

## Cómo completar

Edita los archivos `connection.php` y `api/index.php` incluyendo tu código donde aparece `***YOUR CODE HERE***` siguiendo las instrucciones.

