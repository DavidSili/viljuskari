<?php include 'connect.php'; ?>
<html>
<head profile="http://www.w3.org/2005/20/profile">
<link rel="icon"
	  type="image/png"
	  href="favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Prikaz - radni nalozi</title>
<link type='text/css' rel='stylesheet' href='style.css' />
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
</head>
<body style="width:1240px">

<!-- Ovde ispod menjaš default vrednosti za ono što se prvo pojavi na dropdown meniima -->

<?php

	if(isset($_POST['sel1'])) $sel1=mysqli_real_escape_string($msqli,$_POST['sel1']);
		else $sel1="viljuskar";
	if(isset($_POST['sel2'])) $sel2=mysqli_real_escape_string($msqli,$_POST['sel2']);
		else $sel2="";
	if(isset($_POST['sel3'])) $sel3=mysqli_real_escape_string($msqli,$_POST['sel3']);
		else $sel3="radninalog";
	if(isset($_POST['sel4'])) $sel4=mysqli_real_escape_string($msqli,$_POST['sel4']);
		else $sel4="ASC";
	if(isset($_POST['sel5'])) $sel5=mysqli_real_escape_string($msqli,$_POST['sel5']);
		else $sel5="100";
?>
<div id="header">
	<b>Baza podataka za viljuškare | Prikaz radnih naloga</b>
</div>

<div id="toolbar">
<?php include 'toolbar.html'; ?>
</div>

<div id="wrapper" style="width:1100px">

	<div style="height:24px;margin-bottom:5px">
		<form method="post" action="pnaloga.php?a=1">
			<span style="float:left;margin-top:4px">Pretraga po koloni: </span>	
			<select name="sel1" style="float:left">
<?php
	$result = mysqli_query($mysqli,"SHOW FULL COLUMNS FROM nalozi");
	while ($row=$result->fetch_assoc()) {
        echo '<option value="'.$row['Field'].'" ';
		if ($sel1==$row['Field']) echo 'selected';
		echo '>'.$row['Comment'].'</option>';
    }
?>
			</select>
			<input type="text" name="sel2" <?php echo 'value="'.$sel2.'"'; ?>style="float:left" />
			<span style="float:left;margin-top:4px"> i sortiranje po koloni: </span>	
			<select name="sel3" style="float:left">
<?php
	$result = mysqli_query($mysqli,"SHOW FULL COLUMNS FROM nalozi");
	while ($row=$result->fetch_assoc()) {
        echo '<option value="'.$row['Field'].'" ';
		if ($sel3==$row['Field']) echo 'selected';
		echo '>'.$row['Comment'].'</option>';
    }
?>
			</select>
			<select name="sel4" style="float:left">
				<option value="ASC" <?php if($sel4=="ASC") echo 'selected'; ?>>Penjuće</option>
				<option value="DESC" <?php if($sel4=="DESC") echo 'selected'; ?>>Opadajuće</option>
			</select>
			<span style="float:left;margin-top:4px"> limit: </span>	
			<input type="text" name="sel5" <?php echo 'value="'.$sel5.'"'; ?>style="float:left;width:40px" />
			<input type="submit" value="sortiraj" style="width:128px;margin-left:5px"/>
		</form>
	</div>

<table border=1>
<tr>
<?php
	$result = mysqli_query($mysqli,"SHOW FULL COLUMNS FROM nalozi");
	while ($row=$result->fetch_assoc()) {
        echo '<th>'.$row['Comment'].'</th>';
    }
?>
</tr>
<?php
	$radarrno=array();
	$radarrda=array();
	$sql='SELECT ID, ime FROM radnici';
	$result=mysqli_query($mysqli,$sql) or die;
	while($row=$result->fetch_assoc()) {
		array_push($radarrno,$row['ID']);
		array_push($radarrda,$row['ime']);
	}
	
	$sql='SELECT * FROM nalozi';
	if ($sel2!="") $sql.=' WHERE `'.$sel1.'` LIKE "%'.$sel2.'%" ORDER BY `'.$sel3.'` '.$sel4;
	else $sql.=' ORDER BY `'.$sel3.'` '.$sel4;
	if ($sel5!="") $sql.=' LIMIT '.$sel5;
	$result=mysqli_query($mysqli,$sql) or die;
	$count=1;
	while($row=$result->fetch_assoc()) {
		echo '<tr>';
		foreach($row as $cell) {
		if ($count<=13) {
			if ((substr($cell,4,1)=="-") AND (substr($cell,7,1)=="-")) {
				if ($cell!="0000-00-00") $cell=date('d.m.Y.',strtotime($cell));
					else $cell="";
			}
			if (strlen($cell)>72) $cell = substr($cell, 0, 70).'...';
			echo '<td style="padding:0 2px">';
				if ($count==2) {
					echo str_replace($radarrno, $radarrda, $cell);
				}
					else echo $cell;
			echo '</td>';
			}
			$count++;
		}
		echo '</tr>';
		$count=1;
	}
?>
</table>

</div>

</body>
</html>