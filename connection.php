<?php
	use Neoxygen\NeoClient\ClientBuilder;
	require 'vendor/autoload.php';
	error_reporting(E_ALL ^ E_NOTICE);
	/**********
	*** YOUR CODE HERE
	**********/
    try{
        $connection = ClientBuilder::create()
            ->addConnection('default', 'https', '150.136.170.184', 7474, true, 'neo4j', 'Ce1067865276*')
            ->setAutoFormatResponse(true)
            ->build();
    }catch(\Exception $e){
        var_dump($e);
    }
?>
