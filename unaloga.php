<?php include 'connect.php'; ?>
<html>
<head profile="http://www.w3.org/2005/20/profile">
<link rel="icon"
	  type="image/png"
	  href="favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Unos - radni nalozi</title>
<link type='text/css' rel='stylesheet' href='style.css' />
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="jquery-1.7.2.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("input#autocomplete").autocomplete({
    source: ["filter za vazduh", "filter za ulje", "filter za gas", "filter za gorivo", "hidraulična pumpa", "vodena pumpa", "klizači bočnog pomaka", "motor brisača", "ručica za migavac", "grejač kabine", "alternator", "kočioni sistem", "menjač"]
});
  });
  </script>
</head>
<body>

<?php
if(isset($_GET['a'])) {
	if(isset($_POST['d_radnik'])) $radnik=mysqli_real_escape_string($mysqli,$_POST['d_radnik']);
		else $radnik=array();
	if(isset($_POST['d_radninalog'])) $radninalog=mysqli_real_escape_string($mysqli,$_POST['d_radninalog']);
		else $radninalog="";
	if(isset($_POST['d_tipnaloga'])) $tipnaloga=mysqli_real_escape_string($mysqli,$_POST['d_tipnaloga']);
		else $tipnaloga="";
	if(isset($_POST['d_datumotvaranja'])) $datumotvaranja=mysqli_real_escape_string($mysqli,$_POST['d_datumotvaranja']);
		else $datumotvaranja="";
	if(isset($_POST['d_datumzatvaranja'])) $datumzatvaranja=mysqli_real_escape_string($mysqli,$_POST['d_datumzatvaranja']);
		else $datumzatvaranja="";
	if(isset($_POST['d_viljuskar'])) $viljuskar=mysqli_real_escape_string($mysqli,$_POST['d_viljuskar']);
		else $viljuskar="";
	if(isset($_POST['d_sati'])) $sati=mysqli_real_escape_string($mysqli,$_POST['d_sati']);
		else $sati="";
	if(isset($_POST['d_satiserv'])) $satiserv=mysqli_real_escape_string($mysqli,$_POST['d_satiserv']);
		else $satiserv="";
	if(isset($_POST['d_teren'])) $teren=mysqli_real_escape_string($mysqli,$_POST['d_teren']);
		else $teren="";
	if(isset($_POST['d_defektaza'])) $defektaza=mysqli_real_escape_string($mysqli,$_POST['d_defektaza']);
		else $defektaza="";
	if(isset($_POST['d_napomena'])) $napomena=mysqli_real_escape_string($mysqli,$_POST['d_napomena']);
		else $napomena="";
	if(isset($_POST['d_hide'])) $hide=mysqli_real_escape_string($mysqli,$_POST['d_hide']);
		else $hide="8";
	
	if ($datumotvaranja!="") {
		$datumotvaranja=mysqli_real_escape_string($mysqli,$_POST['d_datumotvaranja']);
		$datumotvaranja=date('Y-m-d',strtotime($datumotvaranja));
	}
	if ($datumzatvaranja!="") {
		$datumzatvaranja=mysqli_real_escape_string($mysqli,$_POST['d_datumzatvaranja']);
		$datumzatvaranja=date('Y-m-d',strtotime($datumzatvaranja));
	}

	$rdn="";
	foreach ($radnik as $a) {
		$rdn.=$a.',';
	}
	$rdn=substr($rdn, 0, -1);

	$delovix="";
	for ($i = 1; $i <= $hide; $i++) {
	if(isset($_POST['d_delovi'.$i.'a'])) $delovia=mysqli_real_escape_string($mysqli,$_POST['d_delovi'.$i.'a']);
		else $delovia='';
	if(isset($_POST['d_delovi'.$i.'b'])) $delovib=mysqli_real_escape_string($mysqli,$_POST['d_delovi'.$i.'b']);
		else $delovib='';
	
	$sql='INSERT INTO delovi (`nalog`,`viljuskar`,`radnik`,`datum`,`naziv`,`broj`) VALUES ("'.$radninalog.'","'.$viljuskar.'","'.$rdn.'","'.$datumzatvaranja.'","'.$delovia.'","'.$delovib.'")';
	if ($delovia!='' AND $delovib!='' AND (strtotime($datumotvaranja)<=strtotime($datumzatvaranja))) mysqli_query($mysqli,$sql) or die;
	
	if ($delovia!='' AND $delovib!='') $delovix.=$delovia.' ('.$delovib.'), ';
	}
	$delovix=substr($delovix, 0, -2);
	
	$sql='INSERT INTO nalozi (`radnik`,`radninalog`,`tipnaloga`,`datumotvaranja`,`datumzatvaranja`,`viljuskar`,`sati`,`satiserv`,`teren`,`defektaza`,`napomena`,`delovi`) VALUES ("'.$rdn.'","'.$radninalog.'","'.$tipnaloga.'","'.$datumotvaranja.'","'.$datumzatvaranja.'","'.$viljuskar.'","'.$sati.'","'.$satiserv.'","'.$teren.'","'.$defektaza.'","'.$napomena.'","'.$delovix.'")';
	mysqli_query($mysqli,$sql) or die;

	
}
?>

<div id="header">
	<b>Baza podataka za viljuškare | Unos radnih naloga</b>
</div>

<div id="toolbar">
<?php include 'toolbar.html'; ?>
</div>

<div id="wrapper">
	<form method="post" action="unaloga.php?a=1">
		<div id="bigbox" style="margin-right:5px">
			<div class="b1" style="height:107px">
				<div class="left">Radnik: </div>
														<!-- Ovde promeni za veličinu ListBox-a -->
				<select type="text" name="d_radnik[]" style="width:200px" size="6" multiple>
			<?php
					$sql = 'SELECT * FROM radnici ORDER BY ime';
					$result = mysqli_query($mysqli,$sql)or die;
					while($row=$result->fetch_assoc()) {
						$id=$row['id'];
						$ime=$row['ime'];
						
					echo '<option value="'.$id.'">'.$ime.'</option>';
					}
			?>
				</select>
			</div>
			<div class="b2">
				<div class="left">Broj radnog naloga: </div>
				<input type="text" name="d_radninalog" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Tip radnog naloga: </div>
				<select type="text" name="d_tipnaloga" style="width:200px">
					<option>Održavanje</option>
					<option>Popravka</option>
				</select>
			</div>
			<div class="b2">
				<div class="left">Datum otvaranja naloga: </div>
				<input type="date" name="d_datumotvaranja" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Datum zatvaranja naloga: </div>
				<input type="date" name="d_datumzatvaranja" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">Viljuškar: </div>
				<select type="text" name="d_viljuskar" style="width:200px">
			<?php
					$sql = 'SELECT proizvodjaci.ime AS ime, viljuskari.model, viljuskari.upis FROM proizvodjaci, viljuskari WHERE (viljuskari.proizvodjac = proizvodjaci.ID)';
					$result = mysqli_query($mysqli,$sql)or die;
					while($row=$result->fetch_assoc()) {
						$model=$row['model'];
						$upis=$row['upis'];
						$proizvodjac=$row['ime'];
						
					echo '<option value="'.$upis.'">'.$proizvodjac.': '.$model.' - r.b: '.$upis.'</option>';
					}
			?>
				</select>
			</div>
			<div class="b1">
				<div class="left">Radni sati viljuškara: </div>
				<input type="text" name="d_sati" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left" style="font-size:10pt">Dnevni rad servisera u satima: </div>
				<input type="text" name="d_satiserv" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Teren na kom se radi: </div>
				<select type="text" name="d_teren" style="width:200px">
					<option>U Apex-u</option>
					<option>Na terenu</option>
				</select>
			</div>
			<div class="b2" style="height:202px">
				<div class="left">Defektaža: </div>
				<textarea name="d_defektaza" style="font-family:arial;width:200px;height:200px" ></textarea>
			</div>
			<div class="b1" style="padding-top:2px;height:103px">
				<div class="left">Napomena: </div>
				<textarea name="d_napomena" style="font-family:arial;width:200px;height:100px" ></textarea>
			</div>
		</div>
		<div id="bigbox">
			<div class="b2" style="height:24px">
				<div class="left">Potrebni delovi: </div><span style="margin-left:65px">Koliko delova: </span>
				<select name="hide" id="hide" onchange="hajdovanje(this.value)">
					<option value="8">8</option>
					<option value="16">16</option>
					<option value="24">24</option>
					<option value="32">32</option>
					<option value="40">40</option>
				</select>
			</div>
			<div id="hide1" >
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi1a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi1b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi2a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi2b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi3a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi3b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi4a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi4b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi5a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi5b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi6a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi6b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi7a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi7b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi8a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi8b" style="width:200px" />
				</div>
			</div>
			<div id="hide2" style="display:none">
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi9a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi9b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi10a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi10b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi11a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi11b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi12a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi12b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi13a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi13b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi14a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi14b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi15a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi15b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi16a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi16b" style="width:200px" />
				</div>
			</div>
			<div id="hide3" style="display:none">
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi17a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi17b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi18a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi18b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi19a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi19b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi20a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi20b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi21a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi21b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi22a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi22b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi23a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi23b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi24a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi24b" style="width:200px" />
				</div>
			</div>
			<div id="hide4" style="display:none">
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi25a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi25b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi26a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi26b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi27a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi27b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi28a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi28b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi29a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi29b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi30a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi30b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi31a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi31b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi32a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi32b" style="width:200px" />
				</div>
			</div>
			<div id="hide5" style="display:none">
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi33a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi33b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi34a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi34b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi35a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi35b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi36a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi36b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi37a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi37b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi38a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi38b" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi39a" style="width:200px" />
				</div>
				<div class="b1">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi39b" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">naziv: </div>
					<input id="autocomplete" name="d_delovi40a" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left" style="font-weight:normal">broj: </div>
					<input type="text" name="d_delovi40b" style="width:200px" />
				</div>
			</div>
			<div style="margin-left:210px">
				<input type="submit" value="Unesi" style="width:95px;margin-right:8px" />
				<input type="reset" value="Obriši" style="width:95px" />
			</div>
		</div>
		<script>
		function hajdovanje(val)
		{
			if (val == '40')
			{
			$('#hide2').show();
			$('#hide3').show();
			$('#hide4').show();
			$('#hide5').show();
			}
			else if (val == '32')
			{
			$('#hide2').show();
			$('#hide3').show();
			$('#hide4').show();
			$('#hide5').hide();
			}
			else if (val == '24')
			{
			$('#hide2').show();
			$('#hide3').show();
			$('#hide4').hide();
			$('#hide5').hide();
			}
			else if (val == '16')
			{
			$('#hide2').show();
			$('#hide3').hide();
			$('#hide4').hide();
			$('#hide5').hide();
			}
			else
			{
			$('#hide2').hide();
			$('#hide3').hide();
			$('#hide4').hide();
			$('#hide5').hide();
			}
		}
		</script>

	</form>
</div>

</body>
</html>