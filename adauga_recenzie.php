<?php
session_start();
if ( !isset( $_SESSION['username'] ) ) {
	header("location: login.php");
}

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
	$stmt = $dbh->prepare("INSERT INTO recenzii VALUES (:titlu,:autor,:cititor,:recenzie)");
	$stmt->bindParam(':titlu', $titlu);
	$stmt->bindParam(':autor', $autor);
	$stmt->bindParam(':cititor', $cititor);
	$stmt->bindParam(':recenzie', $recenzie);
			
	$titlu = $_GET['titlu'];
	$autor = $_GET['autor'];
	$cititor = $_SESSION['username'];
	$recenzie = $_GET['recenzie'];
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