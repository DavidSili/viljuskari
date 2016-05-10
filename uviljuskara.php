<?php include 'connect.php'; ?>
<html>
<head profile="http://www.w3.org/2005/20/profile">
<link rel="icon"
	  type="image/png"
	  href="favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Unos - Viljuškari</title>
<link type='text/css' rel='stylesheet' href='style.css' />
    <script src="js/jquery-1.7.2.js"></script>
</head>
<body>

<?php
if(isset($_GET['a'])) {
		if(isset($_POST['a_vrsta'])) $vrsta=$_POST['a_vrsta'];
			else $vrsta="";
		if(isset($_POST['a_vlasnik'])) $vlasnik=$_POST['a_vlasnik'];
			else $vlasnik="";
		if(isset($_POST['a_upis'])) $upis=$_POST['a_upis'];
			else $upis="";
		if(isset($_POST['a_proizvodjac'])) $proizvodjac=$_POST['a_proizvodjac'];
			else $proizvodjac="";
		if(isset($_POST['a_model'])) $model=$_POST['a_model'];
			else $model="";
		if(isset($_POST['a_tip'])) $tip=$_POST['a_tip'];
			else $tip="";
		if(isset($_POST['a_serijski'])) $serijski=$_POST['a_serijski'];
			else $serijski="";
		if(isset($_POST['a_godina'])) $godina=$_POST['a_godina'];
			else $godina="";
		if(isset($_POST['a_pogon'])) $pogon=$_POST['a_pogon'];
			else $pogon="";
		if(isset($_POST['a_gasmod'])) $gasmod=$_POST['a_gasmod'];
			else $gasmod="";
		if(isset($_POST['a_gasbroj'])) $gasbroj=$_POST['a_gasbroj'];
			else $gasbroj="";
		if(isset($_POST['a_gassonda'])) $gassonda=$_POST['a_gassonda'];
			else $gassonda="";
		if(isset($_POST['a_nosivost'])) $nosivost=$_POST['a_nosivost'];
			else $nosivost="";
		if(isset($_POST['a_radnihsati'])) $radnihsati=$_POST['a_radnihsati'];
			else $radnihsati="";
		if(isset($_POST['a_ravnoteza'])) $ravnoteza=$_POST['a_ravnoteza'];
			else $ravnoteza="";
		if(isset($_POST['a_tezina'])) $tezina=$_POST['a_tezina'];
			else $tezina="";
		if(isset($_POST['a_radijus'])) $radijus=$_POST['a_radijus'];
			else $radijus="";
		if(isset($_POST['a_prolaz'])) $prolaz=$_POST['a_prolaz'];
			else $prolaz="";
		if(isset($_POST['a_brzina'])) $brzina=$_POST['a_brzina'];
			else $brzina="";
		if(isset($_POST['a_pojas'])) $pojas=$_POST['a_pojas'];
			else $pojas="";
		if(isset($_POST['a_kran1'])) $kran1=$_POST['a_kran1'];
			else $kran1="";
		if(isset($_POST['a_kran2'])) $kran2=$_POST['a_kran2'];
			else $kran2="";
		if(isset($_POST['a_kran3'])) $kran3=$_POST['a_kran3'];
			else $kran3="";
		if(isset($_POST['a_kran4'])) $kran4=$_POST['a_kran4'];
			else $kran4="";
		if(isset($_POST['a_kran5'])) $kran5=$_POST['a_kran5'];
			else $kran5="";
		if(isset($_POST['a_kran6'])) $kran6=$_POST['a_kran6'];
			else $kran6="";
		if(isset($_POST['a_viljuske1'])) $viljuske1=$_POST['a_viljuske1'];
			else $viljuske1="";
		if(isset($_POST['a_viljuske2'])) $viljuske2=$_POST['a_viljuske2'];
			else $viljuske2="";
		if(isset($_POST['a_viljuske3'])) $viljuske3=$_POST['a_viljuske3'];
			else $viljuske3="";
		if(isset($_POST['a_viljuske4'])) $viljuske4=$_POST['a_viljuske4'];
			else $viljuske4="";
		if(isset($_POST['a_viljuske5'])) $viljuske5=$_POST['a_viljuske5'];
			else $viljuske5="";
		if(isset($_POST['a_motor1'])) $motor1=$_POST['a_motor1'];
			else $motor1="";
		if(isset($_POST['a_motor2'])) $motor2=$_POST['a_motor2'];
			else $motor2="";
		if(isset($_POST['a_motor3'])) $motor3=$_POST['a_motor3'];
			else $motor3="";
		if(isset($_POST['a_motor4'])) $motor4=$_POST['a_motor4'];
			else $motor4="";
		if(isset($_POST['a_motor5'])) $motor5=$_POST['a_motor5'];
			else $motor5="";
		if(isset($_POST['a_motor6'])) $motor6=$_POST['a_motor6'];
			else $motor6="";
		if(isset($_POST['a_motor7'])) $motor7=$_POST['a_motor7'];
			else $motor7="";
		if(isset($_POST['a_baterija1'])) $baterija1=$_POST['a_baterija1'];
			else $baterija1="";
		if(isset($_POST['a_baterija2'])) $baterija2=$_POST['a_baterija2'];
			else $baterija2="";
		if(isset($_POST['a_baterija3'])) $baterija3=$_POST['a_baterija3'];
			else $baterija3="";
		if(isset($_POST['a_felne1'])) $felne1=$_POST['a_felne1'];
			else $felne1="";
		if(isset($_POST['a_felne2'])) $felne2=$_POST['a_felne2'];
			else $felne2="";
		if(isset($_POST['a_felne3'])) $felne3=$_POST['a_felne3'];
			else $felne3="";
		if(isset($_POST['a_felne4'])) $felne4=$_POST['a_felne4'];
			else $felne4="";
		if(isset($_POST['a_felne5'])) $felne5=$_POST['a_felne5'];
			else $felne5="";
		if(isset($_POST['a_felne6'])) $felne6=$_POST['a_felne6'];
			else $felne6="";
		if(isset($_POST['a_gume1'])) $gume1=$_POST['a_gume1'];
			else $gume1="";
		if(isset($_POST['a_gume2'])) $gume2=$_POST['a_gume2'];
			else $gume2="";
		if(isset($_POST['a_gume3'])) $gume3=$_POST['a_gume3'];
			else $gume3="";
		if(isset($_POST['a_gume4'])) $gume4=$_POST['a_gume4'];
			else $gume4="";
		if(isset($_POST['a_gume5'])) $gume5=$_POST['a_gume5'];
			else $gume5="";
		if(isset($_POST['a_gume6'])) $gume6=$_POST['a_gume6'];
			else $gume6="";
		if(isset($_POST['a_gume7'])) $gume7=$_POST['a_gume7'];
			else $gume7="";
		if(isset($_POST['a_gume8'])) $gume8=$_POST['a_gume8'];
			else $gume8="";
		if(isset($_POST['a_signal1'])) $signal1=$_POST['a_signal1'];
			else $signal1="";
		if(isset($_POST['a_signal2'])) $signal2=$_POST['a_signal2'];
			else $signal2="";
		if(isset($_POST['a_signal3'])) $signal3=$_POST['a_signal3'];
			else $signal3="";
		if(isset($_POST['a_signal4'])) $signal4=$_POST['a_signal4'];
			else $signal4="";
		if(isset($_POST['a_napomena'])) $napomena=$_POST['a_napomena'];
			else $napomena="";

		$sql='INSERT INTO viljuskari (`vrsta`,`vlasnik`,`upis`,`proizvodjac`,`model`,`tip`,`serijski`,`godina`,`pogon`,`gasmod`,`gasbroj`,`gassonda`,`nosivost`,`radnihsati`,`ravnoteza`,`tezina`,`radijus`,`prolaz`,`brzina`,`pojas`,`kran1`,`kran2`,`kran3`,`kran4`,`kran5`,`kran6`,`viljuske1`,`viljuske2`,`viljuske3`,`viljuske4`,`viljuske5`,`motor1`,`motor2`,`motor3`,`motor4`,`motor5`,`motor6`,`motor7`,`baterija1`,`baterija2`,`baterija3`,`felne1`,`felne2`,`felne3`,`felne4`,`felne5`,`felne6`,`gume1`,`gume2`,`gume3`,`gume4`,`gume5`,`gume6`,`gume7`,`gume8`,`signal1`,`signal2`,`signal3`,`signal4`,`napomena`) VALUES ("'.$vrsta.'","'.$vlasnik.'","'.$upis.'","'.$proizvodjac.'","'.$model.'","'.$tip.'","'.$serijski.'","'.$godina.'","'.$pogon.'","'.$gasmod.'","'.$gasbroj.'","'.$gassonda.'","'.$nosivost.'","'.$radnihsati.'","'.$ravnoteza.'","'.$tezina.'","'.$radijus.'","'.$prolaz.'","'.$brzina.'","'.$pojas.'","'.$kran1.'","'.$kran2.'","'.$kran3.'","'.$kran4.'","'.$kran5.'","'.$kran6.'","'.$viljuske1.'","'.$viljuske2.'","'.$viljuske3.'","'.$viljuske4.'","'.$viljuske5.'","'.$motor1.'","'.$motor2.'","'.$motor3.'","'.$motor4.'","'.$motor5.'","'.$motor6.'","'.$motor7.'","'.$baterija1.'","'.$baterija2.'","'.$baterija3.'","'.$felne1.'","'.$felne2.'","'.$felne3.'","'.$felne4.'","'.$felne5.'","'.$felne6.'","'.$gume1.'","'.$gume2.'","'.$gume3.'","'.$gume4.'","'.$gume5.'","'.$gume6.'","'.$gume7.'","'.$gume8.'","'.$signal1.'","'.$signal2.'","'.$signal3.'","'.$signal4.'","'.$napomena.'")';
		mysqli_query($mysqli,$sql) or die;

}

?>

<div id="header">
	<b>Baza podataka za viljuškare | Unos viljuškara</b>
</div>

<div id="toolbar">
<?php include 'toolbar.html'; ?>
</div>

<div id="wrapper">
	<form method="post" action="uviljuskara.php?a=1">
		<div id="bigbox" style="margin-right:5px">
			<div class="b1">
				<div class="left">Vrsta: </div>
				<select type="text" name="a_vrsta" style="width:200px">*
					<option>Nov</option>
					<option>Polovan</option>
					<option>Viljuškar klijenta</option>
				</select>
			</div>
			<div class="b2">
				<div class="left">Vlasnik: </div>
				<select type="text" name="a_vlasnik" style="width:200px">
			<?php
					$sql = 'SELECT * FROM firme';
					$result = mysqli_query($mysqli,$sql)or die;
					while($row=$result->fetch_assoc()) {
						$id=$row['id'];
						$ime=$row['ime'];
						
					echo '<option value="'.$id.'">'.$ime.'</option>';
					}
			?>
				</select>
			</div>
			<div class="b1">
				<div class="left">Broj u UPIS-u: </div>
				<input type="text" name="a_upis" style="width:200px" />*
			</div>
			<div class="b2">
				<div class="left">Proizvođač: </div>
				<select type="text" name="a_proizvodjac" style="width:200px">
			<?php
					$sql = 'SELECT * FROM proizvodjaci';
					$result = mysqli_query($mysqli,$sql)or die;
					while($row=$result->fetch_assoc()) {
						$id=$row['id'];
						$ime=$row['ime'];
						$zemlja=$row['zemlja'];
						
					echo '<option value="'.$id.'">'.$ime.' ('.$zemlja.')</option>';
					}
			?>
				</select>
			</div>
			<div class="b1">
				<div class="left">Model: </div>
				<input type="text" name="a_model" style="width:200px" />*
			</div>
			<div class="b2">
				<div class="left">Tip: </div>
				<input type="text" name="a_tip" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Serijski broj: </div>
				<input type="text" name="a_serijski" style="width:200px" />*
			</div>

			<div class="b2">
				<div class="left">Godina proizvodnje: </div>
				<select type="text" name="a_godina" style="width:60px;margin-right:10px">*
					<?php
					$ovagodina=date('Y');
					for ($x = 1990; $x <= $ovagodina; $x++) {
						echo "<option";
						if ($x==$ovagodina) echo " selected";
						echo ">$x</option>";
					}
					?>
				</select><b>Pogon:</b>
				<select type="text" name="a_pogon" style="width:77px" onchange="conditional_hide(this.value)">*
					<option value="Dizel">Dizel</option>
					<option value="LPG/Benzin">LPG/Benzin</option>
					<option value="Elektro">Elektro</option>
				</select>
			</div>
		<!--
			Kod select-a možeš ovako da ostaviš, a možeš i da promeniš vrednosti. Npr... želiš da ti prikaže reč "TNG" a da vrednost varijable bude "gas". Onda bi trebala da napišeš: <option value="gas">TNG</option>
		-->
			<div id="cond" style="display:none;height:68px">
				<div class="b2">
					<div class="left">Model gas uređaja: </div>
					<input type="text" name="a_gasmod" style="width:200px" />
				</div>
				<div class="b2">
					<div class="left">Serijski broj gas uređaja: </div>
					<input type="text" name="a_gasbroj" style="width:200px" />
				</div>
				<div class="b2" style="height:24px">
					<div class="left" style="font-size:12">Sonda za pokazivanje nivoa gasa: </div> da
					<input type="radio" name="a_gassonda" value="da" style="margin-right:20px" /> ne
					<input type="radio" name="a_gassonda" value="ne" />
				</div>
			</div>
			
			<script>
			function conditional_hide(val)
			{
				if (val == 'LPG/Benzin')
				{
				$('#cond').show();
				}
				else
				{
				$('#cond').hide();
				}
			}
			</script>
			
			<div class="b1">
				<div class="left">Nosivost: </div>
				<input type="text" name="a_nosivost" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">Radnih sati: </div>
				<input type="text" name="a_radnihsati" style="width:200px" />*
			</div>
			<div class="b1">
				<div class="left">Centar ravnoteže: </div>
				<input type="text" name="a_ravnoteza" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">Servisna težina: </div>
				<input type="text" name="a_tezina" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Radijus okretanja: </div>
				<input type="text" name="a_radijus" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">Širina prolaza: </div>
				<input type="text" name="a_prolaz" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left">Brzina: </div>
				<input type="text" name="a_brzina" style="width:200px" />
			</div>
			<div class="b2" style="height:24px">
				<div class="left">Sigurnosni pojas: </div>da
				<input type="radio" name="a_pojas" value="da" style="margin-right:20px" checked /> ne
				<input type="radio" name="a_pojas" value="ne" />
			</div>
			<div class="b1" style="height:24px">
				<div class="left" style="line-height:24px">Kran: </div><br/>
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">tip: </div>
				<select type="text" name="a_kran1" style="width:200px">
					<option>Simplex</option>
					<option>Duplex</option>
					<option>Triplex</option>
				</select>
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">visina spuštenog krana: </div>
				<input type="text" name="a_kran2" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">maksimalna visina podizanja: </div>
				<input type="text" name="a_kran3" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">slobodno podizanje: </div>
				<input type="text" name="a_kran4" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">nagib krana: </div>
				<input type="text" name="a_kran5" style="width:200px" />
			</div>
			<div class="b1" style="height:24px">
				<div class="left" style="font-weight:normal">bočni pomak: </div> da
				<input type="radio" name="a_kran6" value="da" style="margin-right:20px"/> ne
				<input type="radio" name="a_kran6" value="ne" checked />
			</div>
			<div class="b2">
				<div class="left" style="line-height:24px">Viljuške: </div>dužina:
				<input type="text" name="a_viljuske1" style="width:49px;margin:0 7px 0 2px" />širina:
				<input type="text" name="a_viljuske2" style="width:49px;margin-left:2px" /><br/>
			</div>
			<div class="b2" style="height:24px">
				<div class="left" style="font-weight:normal">Raspon između viljušaka: </div>
				<input type="text" name="a_viljuske3" style="width:200px" />
			</div>
			<div class="b2" style="height:48px">
				<div class="left" style="font-weight:normal;height:48px">Rastojanje od centra prednjih točkova do čela viljuškara: </div>
				<input type="text" name="a_viljuske4" style="width:200px;margin-top:24px" />
			</div>
			<div class="b2" style="height:48px">
				<div class="left" style="font-weight:normal;height:48px">Rastojanje od centra zadnjih točkova do začelja viljuškara: </div>
				<input type="text" name="a_viljuske5" style="width:200px;margin-top:24px" />
			</div>
		</div>
		<div id="bigbox">
			<div class="b1" style="height:24px">
				<div class="left" style="line-height:24px">Motor: </div><br/>
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">proizvođač motora: </div>
				<input type="text" name="a_motor1" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">br. motora: </div>
				<input type="text" name="a_motor2" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">nominalna snaga: </div>
				<input type="text" name="a_motor3" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">obrtni moment: </div>
				<input type="text" name="a_motor4" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">broj cilindara: </div>
				<input type="text" name="a_motor5" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">zapremina: </div>
				<input type="text" name="a_motor6" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">kapacitet rezervoara: </div>
				<input type="text" name="a_motor7" style="width:200px" />
			</div>
			<div class="b2" style="height:24px">
				<div class="left" style="line-height:24px">Baterija: </div><br/>
			</div>
			<div class="b2">
				<div class="left" style="font-weight:normal">Radni pritisak: </div>
				<input type="text" name="a_baterija1" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left" style="font-weight:normal">Napon baterije: </div>
				<input type="text" name="a_baterija2" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left" style="font-weight:normal">Kapacitet baterije: </div>
				<input type="text" name="a_baterija3" style="width:200px" />
			</div>
			<div class="b1" style="height:24px">
				<div class="left" style="line-height:24px">Felne: </div><span style="margin: 0 10px">tip:</span>
				<select type="text" name="a_felne1" style="width:157px">
					<option>Jednodelna sa zubom</option>
					<option>Dvodelna bez zuba</option>
				</select>*
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">Dimenzija: </div>napred:
				<input type="text" name="a_felne2" style="width:48px;margin-right:5px" />nazad:
				<input type="text" name="a_felne3" style="width:48px" />*
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">Broj rupa: </div>
				<select type="text" name="a_felne4" style="width:200px">
					<option></option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
				</select>
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal">Ugao pod kojim ulazi šraf: </div>
				<input type="text" name="a_felne5" style="width:200px" />
			</div>
			<div class="b1">
				<div class="left" style="font-weight:normal;font-size:13">Centralizacija (Usredsređivanje): </div>
				<input type="text" name="a_felne6" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left">Gume: </div><span>broj radnih smena:</span>
				<select type="text" name="a_gume1" style="width:78px">
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>*
			</div>
			<div class="b2">
				<div class="left" style="font-weight:normal">Vrsta: </div>
				<select type="text" name="a_gume2" style="width:108px">
					<option>Pneumatske</option>
					<option>Pune</option>
				</select>
				<select type="text" name="a_gume3" style="width:88px">
					<option>Standard</option>
					<option>Lock</option>
				</select>*
			</div>
			<div class="b2">
				<div class="left" style="font-weight:normal">proizvođač: </div>
				<select type="text" name="a_gume4" style="width:200px">
					<option>Telebord</option>
					<option>Greckster</option>
					<option>Orca</option>
					<option>Rota</option>
				</select>*
			</div>
			<div class="b2">
				<div class="left" style="font-weight:normal">dimenzije guma - prednje: </div>
				<input type="text" name="a_gume5" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left" style="font-weight:normal">dimenzije guma - zadnje: </div>
				<input type="text" name="a_gume6" style="width:200px" />
			</div>
			<div class="b2">
				<div class="left" style="font-weight:normal">Broj guma: </div>prednje
				<select type="text" name="a_gume7" style="width:40px;margin-right:23px">
					<option>1</option>
					<option selected>2</option>
					<option>3</option>
					<option>4</option>
				</select>zadnje
				<select type="text" name="a_gume8" style="width:40px">
					<option>1</option>
					<option selected>2</option>
					<option>3</option>
					<option>4</option>
				</select>
			</div>
			<div class="b1" style="height:24px">
				<div class="left">Svetlosna signalizacija</div> napred:
				<span style="margin-left:30px">da
				<input type="radio" name="a_signal1" value="da" checked style="margin-right:20px"/> ne
				<input type="radio" name="a_signal1" value="ne" />
				</span>
			</div>
			<div class="b1" style="height:24px">
				<div class="left" style="height:24px"></div> nazad:
				<span style="margin-left:37px">da
				<input type="radio" name="a_signal2" value="da" checked style="margin-right:20px"/> ne
				<input type="radio" name="a_signal2" value="ne" />
				</span>
			</div>
			<div class="b2" style="height:24px">
				<div class="left">Zvučna signalizacija</div> napred:
				<span style="margin-left:30px">da
				<input type="radio" name="a_signal3" value="da" checked style="margin-right:20px"/> ne
				<input type="radio" name="a_signal3" value="ne" />
				</span>
			</div>
			<div class="b2" style="height:24px">
				<div class="left" style="height:24px"></div> nazad:
				<span style="margin-left:37px">da
				<input type="radio" name="a_signal4" value="da" checked style="margin-right:20px"/> ne
				<input type="radio" name="a_signal4" value="ne" />
				</span>
			</div>
			<div class="b1" style="height:103px">
				<div class="left">Napomena: </div>
				<textarea name="a_napomena" style="font-family:arial;width:200px;height:100px" ></textarea>
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