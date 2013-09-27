<html>
<head>
	<style type="text/css">
   .container {
        width: 50px;
        clear: both;
    }
    .container input {
        width: 100%;
        clear: both;
    }
	</style>
</head>
<body>	
<h1> Karakterer </h1>
<?php
if (isset($_POST['calc']))																//Sjekker om regn ut knappen er trykket
{																						//fjerner mellomrom i inndatafeltene 
    $a = trim($_POST['ka']);
    $b = trim($_POST['kb']);
    $c = trim($_POST['kc']);
    $d = trim($_POST['kd']);
    $e = trim($_POST['ke']);

    $total = ($a!=''?1:0) + ($b!=''?1:0) + ($c!=''?1:0) + ($d!=''?1:0) + ($e!=''?1:0); 	//Regner ut hvor mange felt som er fylt ut, felt som ikke er fylt ut regnes som FALSE, men gjøres om til 0. Felt som er fylt ut regnes som TRUE, men gjøres om til 1.
  if ($total == '5')
	{$gjs = ($a+$b+$c+$d+$e+$b+$e) / ($total + '2');}
	else{																				//Legger sammen summen av feltene delt på antall felt fylt ut
    $gjs = ($a+$b+$c+$d+$e) / $total;	
	}
}?>
<form method="post" action="">
<div class="container">
 <br>
 Skritt: <input type="text" name="ka" size="2"> 
 <br>
 Tølt: <input type="text" name="kb" size="2"> 
 <br>
 Gallopp: <input type="text" name="kc" size="2">
 <br>
 Trav: <input type="text" name="kd" size="2">
 <br>
 Pass (kun for F1): <input type="text" name="ke" size="2">
 <br>
 </div>
 <input type="submit" value="Regn ut" name="calc"> 
</form> 

<?php 
if (isset($_POST['calc']) && $total >= '4' && (is_numeric($a)) && (is_numeric($b)) && (is_numeric($c)) && (is_numeric($d))) {	//Sjekker at regn ut er trykt og sjekker at feltene som er fylt ut er tall
	echo "Karakteren er: " . (round($gjs,2)) ;														//Skriver ut gjennomsnittet som er regnet ut hvis kriteriene møtes, runder også av svaret til 2 desimaler
	} else {
	echo "Vennligst tast inn karakterer" ;												//Hvis noen av kriteriene ikke møtes får man beskjed om å skrive inn karakterene
}
?>
</body>
</html>
