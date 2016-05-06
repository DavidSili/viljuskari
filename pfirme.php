<?php include 'connect.php'; ?>
<html>
<head profile="http://www.w3.org/2005/20/profile">
<link rel="icon"
	  type="image/png"
	  href="favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Prikaz - firme</title>
<link type='text/css' rel='stylesheet' href='style.css' />
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
</head>
<body style="width:2000px">

<!-- Ovde ispod menjaš default vrednosti za ono što se prvo pojavi na dropdown meniima -->

<?php

	if(isset($_POST['sel1'])) $sel1=$_POST['sel1'];
		else $sel1="`firme`.`ime`";
	if(isset($_POST['sel2'])) $sel2=$_POST['sel2'];
		else $sel2="";
	if(isset($_POST['sel3'])) $sel3=$_POST['sel3'];
		else $sel3="`firme`.`ID`";
	if(isset($_POST['sel4'])) $sel4=$_POST['sel4'];
		else $sel4="ASC";
	if(isset($_POST['sel5'])) $sel5=$_POST['sel5'];
		else $sel5="100";
?>
<div id="header" style="width:2000px">
	<b>Baza podataka za viljuškare | Prikaz firmi</b>
</div>

<div id="toolbar">
<?php include 'toolbar.html'; ?>
</div>

<div id="wrapper" style="width:1860px">

	<div style="height:24px;margin-bottom:5px">
		<form method="post" action="pfirme.php?a=1">
			<span style="float:left;margin-top:4px">Pretraga po koloni: </span>	
			<select name="sel1" style="float:left">
<?php
	$result = mysql_query("SHOW FULL COLUMNS FROM firme");
	while ($row = mysql_fetch_assoc($result)) {
		if ($row['Field']!='komercijalista') {
			echo '<option value="`firme`.`'.$row['Field'].'`" ';
			if ($sel1=='`firme`.`'.$row['Field'].'`') echo 'selected';
			echo '>'.$row['Comment'].'</option>';
		}
    }
?>
			</select>
			<input type="text" name="sel2" <?php echo 'value="'.$sel2.'"'; ?>style="float:left" />
			<span style="float:left;margin-top:4px"> i sortiranje po koloni: </span>	
			<select name="sel3" style="float:left">
<?php
	$result = mysql_query("SHOW FULL COLUMNS FROM firme");
	while ($row = mysql_fetch_assoc($result)) {
        echo '<option value="`firme`.`'.$row['Field'].'`" ';
		if ($sel3=='`firme`.`'.$row['Field'].'`') echo 'selected';
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
	$result = mysql_query("SHOW FULL COLUMNS FROM firme");
	while ($row = mysql_fetch_assoc($result)) {
        echo '<th>'.$row['Comment'].'</th>';
    }
?>
</tr>
<?php
	$sql='SELECT firme.*, komercijalisti.ime AS komime FROM firme, komercijalisti WHERE (firme.komercijalista = komercijalisti.ID)';
	if ($sel2!="") $sql.=' AND '.$sel1.' LIKE "%'.$sel2.'%" ORDER BY '.$sel3.' '.$sel4;
	else $sql.=' ORDER BY '.$sel3.' '.$sel4;
	if ($sel5!="") $sql.=' LIMIT '.$sel5;
	$result=mysql_query($sql) or die (mysql_error());
	$count=1;
	while($row=mysql_fetch_assoc($result)) {
		echo '<tr>';
		$komime=$row['komime'];
		foreach($row as $cell) {
		if ((substr($cell,4,1)=="-") AND (substr($cell,7,1)=="-")) $cell=date('d.m.Y.',strtotime($cell));
		if (strlen($cell)>72) $cell = substr($cell, 0, 70).'...';
		if ($count!=17) {
			echo '<td style="padding:0 2px">';
			if ($count==14) echo '<a href="'.$cell.'" style="color:#000;text-decoration:none" target="_blank">'.$cell.'</a>';
			elseif ($count==15) echo $komime;
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