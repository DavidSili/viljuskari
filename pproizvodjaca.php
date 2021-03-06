<?php include 'connect.php'; ?>
<html>
<head profile="http://www.w3.org/2005/20/profile">
<link rel="icon"
	  type="image/png"
	  href="favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Prikaz - proizvođači</title>
<link type='text/css' rel='stylesheet' href='style.css' />
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
	if(isset($_POST['sel1'])) $sel1=mysqli_real_escape_string($msqli,$_POST['sel1']);
		else $sel1="ime";
	if(isset($_POST['sel2'])) $sel2=mysqli_real_escape_string($msqli,$_POST['sel2']);
		else $sel2="";
	if(isset($_POST['sel3'])) $sel3=mysqli_real_escape_string($msqli,$_POST['sel3']);
		else $sel3="id";
	if(isset($_POST['sel4'])) $sel4=mysqli_real_escape_string($msqli,$_POST['sel4']);
		else $sel4="ASC";
?>
<div id="header">
	<b>Baza podataka za viljuškare | Prikaz proizvođača viljuškara</b>
</div>

<div id="toolbar">
<?php include 'toolbar.html'; ?>
</div>

<div id="wrapper">

	<div style="height:24px;margin-bottom:5px">
		<form method="post" action="pproizvodjaca.php?a=1">
			<span style="float:left;margin-top:4px">Pretraga po koloni: </span>	
			<select name="sel1" style="float:left">
				<option value="id" <?php if($sel1=="id") echo 'selected'; ?>>ID</option>
				<option value="ime" <?php if($sel1=="ime") echo 'selected'; ?>>Prezime i ime</option>
				<option value="zemlja" <?php if($sel1=="zemlja") echo 'selected'; ?>>Zemlja</option>
			</select>
			<input type="text" name="sel2" <?php echo 'value="'.$sel2.'"'; ?>style="float:left" />
			<span style="float:left;margin-top:4px"> i sortiranje po koloni: </span>	
			<select name="sel3" style="float:left">
				<option value="id" <?php if($sel3=="id") echo 'selected'; ?>>ID</option>
				<option value="ime" <?php if($sel3=="ime") echo 'selected'; ?>>Prezime i ime</option>
				<option value="zemlja" <?php if($sel3=="zemlja") echo 'selected'; ?>>Zemlja</option>
			</select>
			<select name="sel4" style="float:left">
				<option value="ASC" <?php if($sel4=="ASC") echo 'selected'; ?>>Penjuće</option>
				<option value="DESC" <?php if($sel4=="DESC") echo 'selected'; ?>>Opadajuće</option>
			</select>
			<input type="submit" value="sortiraj" style="width:128px"/>
		</form>
	</div>

<table border=1>
<tr>
<th>ID</th>
<th>Prezime i ime</th>
<th>Zemlja</th>
</tr>
<?php
	$sql='SELECT * FROM proizvodjaci';
	if (isset($sel2) and $sel2!='') $sql.=' WHERE `'.$sel1.'` LIKE "%'.$sel2.'%" ORDER BY `'.$sel3.'` '.$sel4;
	else $sql.=' ORDER BY `'.$sel3.'` '.$sel4;
	$result=mysqli_query($mysqli,$sql) or die;
	while($row=$result->fetch_assoc()) {
		$id=$row['id'];
		$ime=$row['ime'];
		$zemlja=$row['zemlja'];
		echo '<tr><td style="padding:0 10px">'.$id.'</td><td style="padding:0 10px">'.$ime.'</td><td style="padding:0 10px">'.$zemlja.'</td></tr>';
	}
?>
</table>

</div>

</body>
</html>