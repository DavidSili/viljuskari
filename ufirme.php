<?php include 'connect.php'; ?>
<html>
<head profile="http://www.w3.org/2005/20/profile">
<link rel="icon"
	  type="image/png"
	  href="favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Unos - firme</title>
<link type='text/css' rel='stylesheet' href='style.css' />
</head>
<body>

<?php
if(isset($_GET['a'])) {
		if(isset($_POST['c_ime'])) $ime=$_POST['c_ime'];
			else $ime="";
		if(isset($_POST['c_mb'])) $mb=$_POST['c_mb'];
			else $mb="";
		if(isset($_POST['c_delatnost'])) $delatnost=$_POST['c_delatnost'];
			else $delatnost="";
		if(isset($_POST['c_pib'])) $pib=$_POST['c_pib'];
			else $pib="";
		if(isset($_POST['c_adresa'])) $adresa=$_POST['c_adresa'];
			else $adresa="";
		if(isset($_POST['c_mesto'])) $mesto=$_POST['c_mesto'];
			else $mesto="";
		if(isset($_POST['c_telefon'])) $telefon=$_POST['c_telefon'];
			else $telefon="";
		if(isset($_POST['c_fax'])) $fax=$_POST['c_fax'];
			else $fax="";
		if(isset($_POST['c_mobilni'])) $mobilni=$_POST['c_mobilni'];
			else $mobilni="";
		if(isset($_POST['c_kontakt'])) $kontakt=$_POST['c_kontakt'];
			else $kontakt="";
		if(isset($_POST['c_pozicija'])) $pozicija=$_POST['c_pozicija'];
			else $pozicija="";
		if(isset($_POST['c_email'])) $email=$_POST['c_email'];
			else $email="";
		if(isset($_POST['c_www'])) $www=$_POST['c_www'];
			else $www="";
		if(isset($_POST['c_komercijalista'])) $komercijalista=$_POST['c_komercijalista'];
			else $komercijalista="";
		if(isset($_POST['c_napomena'])) $napomena=$_POST['c_napomena'];
			else $napomena="";
		
		$sql='INSERT INTO firme (`ime`,`mb`,`delatnost`,`pib`,`adresa`,`mesto`,`telefon`,`fax`,`mobilni`,`kontakt`,`pozicija`,`email`,`www`,`komercijalista`,`napomena`) VALUES ("'.$ime.'","'.$mb.'","'.$delatnost.'","'.$pib.'","'.$adresa.'","'.$mesto.'","'.$telefon.'","'.$fax.'","'.$mobilni.'","'.$kontakt.'","'.$pozicija.'","'.$email.'","'.$www.'","'.$komercijalista.'","'.$napomena.'")';
		mysqli_query($mysqli,$sql) or die;
}
?>

<div id="header">
	<b>Baza podataka za viljuškare | Unos firmi</b>
</div>

<div id="toolbar">
<?php include 'toolbar.html'; ?>
</div>

<div id="wrapper">
	<form method="post" action="ufirme.php?a=1">
		<div id="bigbox">
			<div class="b1">
				<div class="left">Naziv firme: </div>
				<input type="text" name="c_ime" style="width:200px" />*
			</div>
			<div class="b2">
				<div class="left">Matični broj: </div>
				<input type="text" name="c_mb" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Delatnost: </div>
				<input type="text" name="c_delatnost" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">PIB: </div>
				<input type="text" name="c_pib" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Adresa: </div>
				<input type="text" name="c_adresa" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">Mesto: </div>
				<input type="text" name="c_mesto" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Telefon: </div>
				<input type="text" name="c_telefon" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">Fax: </div>
				<input type="text" name="c_fax" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Mobilni: </div>
				<input type="text" name="c_mobilni" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">Osoba za kontakt: </div>
				<input type="text" name="c_kontakt" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Pozicija osobe za kontakt: </div>
				<input type="text" name="c_pozicija" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">E-mail: </div>
				<input type="text" name="c_email" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">WWW: </div>
				<input type="text" name="c_www" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">Naznačeni komercijalista: </div>
				<select type="text" name="c_komercijalista" style="width:200px">
			<?php
					$sql = 'SELECT * FROM komercijalisti ORDER BY ime';
					$result = mysqli_query($mysqli,$sql)or die;
					while($row=$result->fetch_assoc()) {
						$ID=$row['ID'];
						$ime=$row['ime'];
						
					echo '<option value="'.$ID.'">'.$ime.'</option>';
					}
			?>
				</select>
			</div>
			<div class="b1">
				<div class="left">Napomena: </div>
				<textarea name="c_napomena" style="font-family:arial;width:200px;height:100px" ></textarea>
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