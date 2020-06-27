<?php
if (!empty($_GET['titlu']) && !empty($_GET['autor']) && is_numeric($_GET['pagini']) && !empty($_GET['gen'])) {
try{
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');
	$stmt = $dbh->prepare("INSERT INTO carti VALUES (:titlu,:autor,:pagini,:gen,NULL)");
	$stmt->bindParam(':titlu', $titlu);
	$stmt->bindParam(':autor', $autor);
	$stmt->bindParam(':pagini', $pagini);
	$stmt->bindParam(':gen', $gen);
			
	$titlu = $_GET['titlu'];
	$autor = $_GET['autor'];
	$pagini = $_GET['pagini'];
	$gen = $_GET['gen'];
	try{
		$stmt->execute();
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}			
}	

?>