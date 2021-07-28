<?PHP
header('Content-Type: text/html; charset=UTF-8');
$kapcsolat = new PDO("mysql:host=localhost;dbname=szoftweb_szoftver", "szoftweb_szoftver", "83b7MAJ[Wlj.z0");
$kapcsolat->exec("SET NAMES UTF8");

// Táblák
$tablabankszamla = "bankszamla";
$tablatranzakciok = "tranzakciok";
?>