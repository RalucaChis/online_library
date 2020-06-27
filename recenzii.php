<?php
$found=0;
if (!empty($_GET['titlu'])) {
try{
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');

	echo "<form>";
    echo "<fieldset>";
    echo "<legend>Recenzii:</legend>";
	foreach ($pdo->query('SELECT * from recenzii') as $row) {
		if ($row['titlu'] == $_GET['titlu']){
			echo "<textarea rows='3' cols='90' readonly>"; 
			echo $row['cititor'] . " : ";
			echo $row['recenzie'];
			echo "</textarea>";
			$found = 1;
		}		
	}		
	echo "</fieldset>";
	echo "</form>";
	
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
if($found==0) echo "Nu există recenzii pentru acestă carte.";
}

?>