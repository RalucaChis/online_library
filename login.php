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
	width: 20%;
	display: block;
	margin-left: auto;
	margin-right: auto; 
}
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 800%;
  background-color: white;
  color: black;
  text-align: center;
  border-radius: 6px;
  
  /* Position the tooltip */
  position: absolute;
  top: -5px;
  left: 105%;
}
.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>

</head>
<body>
	<img src="./img/book.png">
	<h3><i>Întotdeauna mi-am imaginat Paradisul ca fiind un fel de bibliotecă – Jorge Luis Borges</i></h3>
	<form method="post">
      <fieldset>
         <label for="nume">Nume:</label><br>
         <input type="text" size="30" maxlength="30" id="nume" name="nume" required><br><br>
         <label for="parola">Parola:</label><br>
         <input type="password" size="30" maxlength="30" id="parola" name="parola" required><br><br>
		 <button type="submit" class="button">LogIn</button>
		 <div class="tooltip">Nu ai cont?
			<span class="tooltiptext">Pentru a-ți crea un cont va trebui să mergi la biblioteca județeană. 
				Acolo îți vei putea crea contul și vei primi și un card de cititor fidel, fără de care nu poți împrumuta cărți.</span>
		 </div>
	  </fieldset>
	</form>	
	<?php
		session_start();
		
        if (!empty($_POST['nume']) && !empty($_POST['parola'])) {
			if ($_POST['nume'] == 'admin' && $_POST['parola'] == 'admin') {
				header("location: ./administrare/admin.html");
            } else {
				$pdo = new PDO('mysql:host=127.0.0.1;dbname=crig0227','crig0227','crig0227');

				foreach( $pdo->query('SELECT * FROM utilizatori') as $row){
					if($row['username']==$_POST['nume'] and $row['password']==$_POST['parola']){
						$_SESSION['username'] = $_POST['nume'];
						header("location: biblio.html");
					} 
				}
				function alert($msg) {
					echo "<script type='text/javascript'>alert('$msg');</script>";
				}
				alert("Nume sau parole incorecte");
			}
        }	
    ?>
	
</body>
