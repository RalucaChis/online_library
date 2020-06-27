<?php
if (!empty($_GET['titlu']) && !empty($_GET['autor'])) {
try{
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');
	$stmt = $dbh->prepare("DELETE FROM `carti` WHERE titlu=:titlu and autor=:autor");
	$stmt->bindParam(':titlu', $titlu);
	$stmt->bindParam(':autor', $autor);
			
	$titlu = $_GET['titlu'];
	$autor = $_GET['autor'];
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