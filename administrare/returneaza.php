<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');
$result = 0;

foreach( $pdo->query('SELECT * FROM imprumuturi') as $row){
	if($row['titlu']==$_GET['titlu'] and $row['autor']==$_GET['autor']
	   and $row['cititor']==$_GET['cititor'] and $row['returnata']==NULL){
		$result = 1;
	}
}	

if ($result == 1) {

try{
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');
	$stmt = $dbh->prepare("UPDATE `imprumuturi` SET `returnata`='DA',`data_returnare`=:data_returnare WHERE `titlu`=:titlu and`autor`=:autor and`cititor`=:cititor");
	$stmt->bindParam(':titlu', $titlu);
	$stmt->bindParam(':autor', $autor);
	$stmt->bindParam(':cititor', $cititor);
	$stmt->bindParam(':data_returnare', $data_returnare);
		
	$titlu = $_GET['titlu'];
	$autor = $_GET['autor'];
	$cititor = $_GET['cititor'];
	$data_returnare = date("Y-m-d");
		
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