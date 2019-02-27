<?php
//client web service 
//to call film web service

require 'vendor/autoload.php';
$client = new GuzzleHttp\Client();
$result = $client->request('GET', 'http://localhost/webservice/sakila/film_svc.php');

$films = json_decode($result->getBody()->getContents());
foreach ($films as $film){
	echo $film->title . '<br>';
	//echo $film->descr . '<br>';
}
?>