<?php 

include "../entities/Event.php";
$list= [];
$db = Db::getInstance();
$req = $db->query('SELECT code FROM `event` ');
foreach($req->fetchALL() as $temp) {
	$list[] = $temp['code'];
}
$q = $_REQUEST["q"];
$existe = False;
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($list as $name) {
        if (strcmp($q,$name)==0) {
            $existe = True;
        }
    }
}
// Output "no suggestion" if no hint was found or output correct values
echo $existe === True ? "Ce code existe deja" : "";
?>