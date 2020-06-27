<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');

echo "<table>";
echo "<tr>";
echo "<th>Titlu</th>";
echo "<th>Autor</th>";
echo "<th>Pagini</th>";
echo "<th>Gen</th>";
echo "</tr>";

foreach( $pdo->query('SELECT * FROM carti') as $row){
	if($row['gen']==$_GET['q'] or $_GET['q']=="tot"){
		echo "<tr>";
		echo "<td>" . $row['titlu'] . "</td>";
		echo "<td>" . $row['autor'] . "</td>";
		echo "<td>" . $row['pagini'] . "</td>";
		echo "<td>" . $row['gen'] . "</td>";
		echo "</tr>";
	}
}	


echo "</table>";
?>