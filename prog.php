<?PHP
include('webfajlok/backend/csatlakozas.php');

function consoleLog($message)
{
	echo "<!doctype html><html><body><script type='text/javascript'> console.log('$message'); </script></body></html>";
}

$ertek = $_GET['ertek'];
$bevan = false;
$ido = time();

$tomb2 = $kapcsolat->query("SELECT * FROM $tablabankszamla WHERE szamlaszam = '$szamlaszam' AND pinkod = '$pinkod'");
foreach($tomb2 as $row)
{
	$bevan = true;
	$id5 = $row['id'];
	$nev5 = $row['nev'];
	$szamlaszam5 = $row['szamlaszam'];
	$pinkod5 = $row['pinkod'];
	$osszeg5 = $row['osszeg'];
}

// Befizetés
if ($ertek == "befizetes" AND $bevan)
{
	include('webfajlok/backend/befizetes.php');
}

// Pénz felvétel
else if ($ertek == "kifizetés" AND $bevan)
{
	include('webfajlok/backend/kifizetes.php');
}

// Átutalás
else if ($ertek == "atutalas" AND $bevan)
{
	include('webfajlok/backend/atutalas.php');
}

// Tranzakciós előzmények
else if ($ertek == "tranzelozmenyek" AND $bevan)
{
	include('webfajlok/backend/tranzelozmenyek.php');
}

else
{
	echo "Rossz oldalra tévedtél! :)";
}
?>