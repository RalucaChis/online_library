<?php
session_start();
if ( !isset( $_SESSION['username'] ) ) {
	header("location: login.php");
}

$pdo = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');

echo "<table>";
echo "<tr>";
echo "<th>Titlu</th>";
echo "<th>Autor</th>";
echo "<th>Cititor</th>";
echo "<th>Data scadenta</th>";
echo "<th>Returnata</th>";
echo "<th>Data returnare</th>";
echo "</tr>";

foreach( $pdo->query('SELECT * FROM imprumuturi') as $row){
		echo "<tr>";
		echo "<td>" . $row['titlu'] . "</td>";
		echo "<td>" . $row['autor'] . "</td>";
		echo "<td>" . $row['cititor'] . "</td>";
		echo "<td>" . $row['due_date'] . "</td>";
		if($row['returnata'] == NULL and $row['data_returnare'] == NULL){
			echo "<td> NU </td>";
			echo "<td> NU </td>";
		} else {
			echo "<td>" . $row['returnata'] . "</td>";
			echo "<td>" . $row['data_returnare'] . "</td>";
		}
		echo "</tr>";	
}	
echo "</table>";

?>