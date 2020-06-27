<html lang="ro">
<head>
   <meta charset="UTF-8">
   <title>Biblioteca Online</title>
<style>
body{
	background-image: url('./img/wallpaper.png');
}	
h3,a{
	color: rgb(255, 255, 153);
	text-align: center;
}
input {
  width: 100%;
}
.button {
  background-color: rgb(185, 122, 87);
  color: rgb(255, 255, 153);
  text-align: center;
  display: inline-block;
  font-size: 16px;
  transition-duration: 0.4s;
}
.button:hover {
  background-color: rgb(255, 255, 153);
  color: black;
}
form {
	width:35%;
	color: rgb(255, 255, 153);
	padding: 30px;
	margin: 0 auto;
}
fieldset {
	border: 2px solid white;
}
img{
	width: 25%;
	display: block;
	margin-left: auto;
	margin-right: auto; 
}
</style>

</head>
<body>
	<img src="./img/book.png">
	<form method="post">
      <fieldset>
         <label for="nume">Nume:</label><br>
         <input type="text" size="30" maxlength="30" id="nume" name="nume" required><br><br>
         <label for="parola">Parola:</label><br>
         <input type="password" size="30" maxlength="30" id="parola" name="parola" required><br><br>
		 <label for="parola2">Confirma Parola:</label><br>
         <input type="password" size="30" maxlength="30" id="parola2" name="parola2" required><br><br>
		 <button type="submit" class="button">Sign in</button>
	  </fieldset>
	</form>	
	<?php
        if (!empty($_POST['nume']) && !empty($_POST['parola']) && !empty($_POST['parola2'])) {
			if ($_POST['parola'] == $_POST['parola2']) {
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
				
				function alert($msg) {
					echo "<script type='text/javascript'>alert('$msg');</script>";
				}
				alert("Nume sau parole incorecte");
			}
        }	
    ?>
	
</body>
