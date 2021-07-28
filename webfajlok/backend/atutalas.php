<?PHP
$celszamlaszamtulajneve = $_POST['celszamlaszamtulajneve'];
$celszamlaszam = $_POST['celszamlaszam'];
$osszeg = $_POST['osszeg'];
$szamlaszam = $_POST['szamlaszam'];
$pinkod = $_POST['pinkod'];

$nev;
$pinkod2;
$osszeg2;

$tomb2 = $kapcsolat->query("SELECT * FROM $tablabankszamla WHERE szamlaszam = '$szamlaszam' AND pinkod = '$pinkod'");
foreach($tomb2 as $row) { $nev = $row['nev']; $pinkod2 = $row['pinkod']; $osszeg2 = $row['osszeg']; }
if ($pinkod != "" AND $pinkod2 != "" AND $osszeg != "" AND $osszeg2 != "" AND $celszamlaszamtulajneve != "" AND $celszamlaszam != "")
{
	$nev2;
	$szamlaszam2;
	$osszeg3;
	
	$tomb2 = $kapcsolat->query("SELECT * FROM $tablabankszamla WHERE nev = '$celszamlaszamtulajneve' AND szamlaszam = '$celszamlaszam'");
	foreach($tomb2 as $row) { $celid = $row['id']; $nev2 = $row['nev']; $szamlaszam2 = $row['szamlaszam']; $osszeg3 = $row['osszeg']; }
	
	if ($nev2 != "" AND $szamlaszam2 != "" AND $osszeg3 != "")
	{
		if ($osszeg <= $osszeg2)
		{
			$osszeg2 -= $osszeg;
			$osszeg3 += $osszeg;
			// saját
			$kapcsolat->exec("UPDATE $tablabankszamla SET ossszeg = '$osszeg2' WHERE szamlaszam = '$szamlaszam'");
			$kapcsolat->exec("INSERT INTO $tablatranzakciok (bankszamlaid, datum, mi, osszeg, egyenleg) VALUES ('$id5', '$ido', '-', '$osszeg', $osszeg2)");
			
			// cél
			$kapcsolat->exec("UPDATE $tablabankszamla SET ossszeg = '$osszeg3' WHERE szamlaszam = '$celszamlaszam'");
			$kapcsolat->exec("INSERT INTO $tablatranzakciok (bankszamlaid, datum, mi, osszeg, egyenleg) VALUES ('$celid', '$ido', '+', '$osszeg', $osszeg3)");
			
			// Siker
		}
		else
		{
		// Nincs annyi pénz a számládon, mint amennyit át szeretnél utalni
		}
	}
	else
	{
		// Az általad megadott célbankszámla adatok nem jók
	}
	
}
else
{
	// Az általad megadott adatok nem jók
}
?>