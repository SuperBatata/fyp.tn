<?php 

include "../entities/Event.php";
$list= [];
$db = Db::getInstance();
$req = $db->query('SELECT nom FROM `event` ');
foreach($req->fetchALL() as $temp) {
	/*$event = new event();
	$event->setid_event($temp['id_event']);
	$event->setnom($temp['nom']);
	$event->setcode($temp['code']);
	$event->setdate_event($temp['date_event']);
	$event->setlieu($temp['lieu']);*/
	$list[] = $temp['nom'];
}
$q = $_REQUEST["q"];
$hint = "";
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($list as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}
// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>