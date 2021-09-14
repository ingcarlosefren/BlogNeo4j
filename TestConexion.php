<?php
use Neoxygen\NeoClient\ClientBuilder;

require 'vendor/autoload.php';

    try{
        $connection = ClientBuilder::create()
            ->addConnection('default', 'http', '150.136.170.184', 7474, true, 'neo4j', 'Ce1067865276*')
            ->setAutoFormatResponse(true)
            ->build();
            
            //busqueda especifica
            
            $query = 'MATCH (n:Movie) RETURN n LIMIT 1';
            $result = $connection->sendCypherQuery($query)->getResult();
        
            foreach ($result->getNodes() as $node) {
                echo ($node->getProperty('title')) . '</br>';
                
                echo 'Conexion Exitosa...';
            }
            
    }catch(\Exception $e){
        echo $e;

    }


?>