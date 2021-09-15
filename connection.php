<?php
	use Neoxygen\NeoClient\ClientBuilder;
	require 'vendor/autoload.php';
	error_reporting(E_ALL ^ E_NOTICE);
	/**********
	*** YOUR CODE HERE
	**********/
    try{
        $connection = ClientBuilder::create()
            ->addConnection('default', 'http', 'ip_hostname', 'port', true, 'user', 'pass')
            ->setAutoFormatResponse(true)
            ->build();
    }catch(\Exception $e){
        var_dump($e);
    }
?>
