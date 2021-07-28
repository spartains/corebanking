<?PHP
$szamlaszam = $_POST['szamlaszam'];
$pinkod = $_POST['pinkod'];
$osszeg = $_POST['osszeg'];
$pinkod2;
$osszeg2;

$tomb2 = $kapcsolat->query("SELECT * FROM $tablabankszamla WHERE szamlaszam = '$szamlaszam' AND pinkod = '$pinkod'");
foreach($tomb2 as $row) { $pinkod2 = $row['pinkod']; $osszeg2 = $row['osszeg']; }
if ($pinkod != "" AND $pinkod2 != "" AND $osszeg != "" AND $osszeg2 != "")
{
	$osszeg2 += $osszeg;
	$kapcsolat->exec("UPDATE $tablabankszamla SET ossszeg = '$osszeg2' WHERE szamlaszam = '$szamlaszam'");
	$kapcsolat->exec("INSERT INTO $tablatranzakciok (bankszamlaid, datum, mi, osszeg, egyenleg) VALUES ('$id5', '$ido', '+', '$osszeg', $osszeg2)");
	// Siker
}
else
{
	// Az általad megadott adatok nem jók
}
?>