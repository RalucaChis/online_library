<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');
$result = 0;

foreach( $pdo->query('SELECT * FROM carti') as $row){
	if($row['titlu']==$_GET['titlu'] and $row['autor']==$_GET['autor']){
		$result = 1;
	}
}	

if ($result == 1) {

try{
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');
	$stmt = $dbh->prepare("INSERT INTO imprumuturi values (:titlu,:autor,:cititor,:due_date,NULL,NULL)");
	$stmt->bindParam(':titlu', $titlu);
	$stmt->bindParam(':autor', $autor);
	$stmt->bindParam(':cititor', $cititor);
	$stmt->bindParam(':due_date', $due_date);
				
	$titlu = $_GET['titlu'];
	$autor = $_GET['autor'];
	$cititor = $_GET['cititor'];
	$due_date = date("Y-m-d", strtotime("+2 Weeks"));
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