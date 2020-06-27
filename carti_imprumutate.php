<?php
session_start();
if ( !isset( $_SESSION['username'] ) ) {
	header("location: login.php");
}
else{
$pdo = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');
$result=$pdo->query("SELECT * FROM information_schema.tables WHERE table_schema = 'crig0227' AND table_name = 'imprumuturi'")->rowCount();

if($result==0){
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');
	$pdo->query("CREATE TABLE imprumuturi (titlu varchar(20),autor varchar(20),cititor varchar(20),
					due_date date,returnata varchar(20), data_returnare date)");

}
try{
$zile = 0;
$pdo = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');

echo "<table>";
echo "<tr>";
echo "<th>Titlu</th>";
echo "<th>Autor</th>";
echo "<th>Data scadenta</th>";
echo "<th>Returnata</th>";
echo "<th>Data returnare</th>";
echo "</tr>";

foreach( $pdo->query('SELECT * FROM imprumuturi') as $row){
	if($row['cititor']==$_SESSION['username']){
		echo "<tr>";
		echo "<td>" . $row['titlu'] . "</td>";
		echo "<td>" . $row['autor'] . "</td>";
		echo "<td>" . $row['due_date'] . "</td>";
		if($row['returnata'] == NULL and $row['data_returnare'] == NULL){
			echo "<td> NU </td>";
			echo "<td> NU </td>";
		} else {
			echo "<td>" . $row['returnata'] . "</td>";
			echo "<td>" . $row['data_returnare'] . "</td>";
		}
		echo "</tr>";
		if($row['returnata'] == NULL){
			if($row['due_date'] < date("Y-m-d")){
				$zile=$zile + date("d",time()-strtotime($row['due_date']));	
			}	
		} else {
			if($row['due_date'] < $row['data_returnare']){
				$zile=$zile + date("d",strtotime($row['data_returnare'])-strtotime($row['due_date']));	
			}
		}
	}
}	
echo "</table>";
echo "<p>Zile penalizări: ";
echo $zile;
echo "</p>";
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}	
}	
?>