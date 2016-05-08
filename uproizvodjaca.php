<?php include 'connect.php'; ?>
<html>
<head profile="http://www.w3.org/2005/20/profile">
<link rel="icon"
	  type="image/png"
	  href="favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Unos - proizvođači</title>
<link type='text/css' rel='stylesheet' href='style.css' />
</head>
<body>

<?php
if(isset($_GET['a'])) {
		if(isset($_POST['e_ime'])) $ime=$_POST['e_ime'];
			else $ime="";
		if(isset($_POST['e_zemlja'])) $zemlja=$_POST['e_zemlja'];
			else $zemlja="";
		
		$sql='INSERT INTO proizvodjaci (`ime`,`zemlja`) VALUES ("'.$ime.'","'.$zemlja.'")';
		mysqli_query($mysqli,$sql) or die;
}
?>

<div id="header">
	<b>Baza podataka za viljuškare | Unos proizvođača viljuškara</b>
</div>

<div id="toolbar">
<?php include 'toolbar.html'; ?>
</div>

<div id="wrapper">
	<form method="post" action="uproizvodjaca.php?a=1">
		<div id="bigbox">
			<div class="b1">
				<div class="left">Ime: </div>
				<input type="text" name="e_ime" style="width:200px" />*
			</div>
			<div class="b2">
				<div class="left">Zemlja: </div>
				<input type="text" name="e_zemlja" style="width:200px" />
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