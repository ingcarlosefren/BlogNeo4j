<?php
use Neoxygen\NeoClient\ClientBuilder;

require 'vendor/autoload.php';

    try{
        $connection = ClientBuilder::create()
            ->addConnection('default', 'http', 'ip_hostname', 'port', true, 'user', 'pass')
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
