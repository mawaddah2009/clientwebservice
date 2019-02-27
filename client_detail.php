<form method="post" action="">
Film ID : <input type="text" name="id">
<input type="submit" value="cari">

</form>

<?php
if (isset($_POST['id'])) {
	include 'vendor/autoload.php';
	$client = new GuzzleHttp\Client();
	$url = 'http://localhost/webservice/sakila/film_detail.php';
	$id = $_POST['id'];
	$param = [
		'query' => ['id' => $id]
		];
	$result = $client->request('GET', $url, $param);
	$film = json_decode($result->getBody()->getContents());
	if(isset($film->err)){
		echo "Tiada Rekod";
		}else{
			echo "ID : $film->film_id <br>";
			echo "TITLE: $film->title <br>";
			echo "DESCRIPTION : $film->description <br>";
			//echo $film->title;
		}
} 
?>