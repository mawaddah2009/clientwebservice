<?php
//client web service
require "vendor/autoload.php";
$client = new GuzzleHttp\Client(['verify' => false]);
$result = $client->request('GET', 'http://localhost/webservice/sakila/film_svc.php');
//var_dump($response->getBody()->getContents());
$films = json_decode($result->getBody()->getContents());
echo "<h3>My Favourite Film List</h3>";
echo '<table border=1 cellpadding=0 cellspacing=0>';
echo '<tr bgcolor="#ff99dd"><td>No</td><td>Title</title><td>Description</td>';
foreach ($films as $key => $film) {	
	echo '<tr>';
	echo '<td align="center">'.($key+1).'.</td>';
	echo '<td>'.$film->title.'</td>';
	echo '<td>'.$film->descr.'</td>';
	echo '</tr>';
}
echo '</table>';