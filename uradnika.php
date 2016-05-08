<?php include 'connect.php'; ?>
<html>
<head profile="http://www.w3.org/2005/20/profile">
<link rel="icon"
	  type="image/png"
	  href="favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Unos - radnici</title>
<link type='text/css' rel='stylesheet' href='style.css' />
</head>
<body>

<?php
if(isset($_GET['a'])) {
		if(isset($_POST['b_ime'])) $ime=$_POST['b_ime'];
			else $ime="";
		if(isset($_POST['b_pozicija'])) $pozicija=$_POST['b_pozicija'];
			else $pozicija="";
		if(isset($_POST['b_telefon'])) $telefon=$_POST['b_telefon'];
			else $telefon="";
		
		$sql='INSERT INTO radnici (`ime`,`pozicija`,`telefon`) VALUES ("'.$ime.'","'.$pozicija.'","'.$telefon.'")';
		mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli).' - '.$sql);
}
?>

<div id="header">
	<b>Baza podataka za viljuškare | Unos radnika</b>
</div>

<div id="toolbar">
<?php include 'toolbar.html'; ?>
</div>

<div id="wrapper">
	<form method="post" action="uradnika.php?a=1">
		<div id="bigbox">
			<div class="b1">
				<div class="left">Prezime i ime: </div>
				<input type="text" name="b_ime" style="width:200px" />*
			</div>
			<div class="b2">
				<div class="left">Pozicija: </div>
				<input type="text" name="b_pozicija" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Telefon: </div>
				<input type="text" name="b_telefon" style="width:200px" />
			</div>
			<div style="margin-left:210px">
				<input type="submit" value="Unesi" style="width:95px;margin-right:8px" />
				<input type="reset" value="Obriši" style="width:95px" />
			</div>
		</div>
	</form>
</div>

</body>
</html>