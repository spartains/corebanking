<?PHP
$szamlaszam = $_POST['szamlaszam'];
$pinkod = $_POST['pinkod'];
$pinkod2;

// Szűrők
$szures = $_POST['szures']; // ki/be fizetés | '+'-be, '-'-ki, '|'-ido
$idokezd = $_POST['idokezd']; // pl.: 2021-07-28 12:40:00
$idovege = $_POST['idovege']; // pl.: 2021-07-28 12:41:54
$rendezes = $_POST['rendezes']; // datum | '+'-növekvő, '-'-csökkenő
switch ($szures)
{
	case "+": $szures = "AND $tablatranzakciok.mi = '$szures'";break;
	case "-": $szures = "AND $tablatranzakciok.mi = '$szures'";break;
	case "|": $szures = "AND $tablatranzakciok.datum BETWEEN '$idokezd' AND '$idovege'";break;
	default: $szures = ""; break;
}
switch ($rendezes)
{
	case "+": $rendezes = "ORDER BY $tablatranzakciok.datum ASC";break;
	case "-": $rendezes = "ORDER BY $tablatranzakciok.datum DESC";break;
	default: $rendezes = ""; break;
}
// Szűrők vége

$tomb2 = $kapcsolat->query("SELECT * FROM $tablabankszamla WHERE szamlaszam = '$szamlaszam' AND pinkod = '$pinkod'");
foreach($tomb2 as $row) { $pinkod2 = $row['pinkod']; }
if ($pinkod != "" AND $pinkod2 != "")
{
	$tomb2 = $kapcsolat->query("SELECT $tablatranzakciok.datum AS datum, $tablatranzakciok.mi AS mi, $tablatranzakciok.osszeg AS osszeg2, $tablatranzakciok.egyenleg AS egyenleg FROM $tablatranzakciok INNER JOIN $tablabankszamla ON $tablatranzakciok.bankszamlaid = $tablabankszamla.id WHERE $tablabankszamla.id = '$id5' $szures $rendezes");
	foreach($tomb2 as $row)
	{
		$datum = $row['datum'];
		$mi = $row['mi'];
		$osszeg = $row['osszeg2'];
		$egyenleg = $row['egyenleg'];
		
		// Tranzakciós előzmények nyomtatása console-ra
		consoleLog("Dátum: $datum | Összeg: $mi$osszeg | Egyenleg: $egyenleg");
		
		// Siker, visszairányítás a frontendre
	}
	
	// Nincsenek tranzakciók
}
else
{
	// Az általad megadott adatok nem jók
}
?>