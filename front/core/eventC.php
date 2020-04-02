<?php

include "../entities/Event.php";
class eventsController {
	
	public static function all(){
		$list= [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM `event` order by `date_event`');
		foreach($req->fetchALL() as $temp) {
			$event = new event();
			$event->setid_event($temp['id_event']);
			$event->setnom($temp['nom']);
			$event->setcode($temp['code']);
			$event->setdate_event($temp['date_event']);
			$event->setlieu($temp['lieu']);
			$list[]=$event;
			
		}
		return $list;
	}
	
	public static function allwithSearch($value){
		$list= [];
		$db = Db::getInstance();
		$req = $db->prepare("SELECT * FROM `event` where CONCAT(id_event, nom,code, date_event,lieu) LIKE '%" . $value . "%'");
		$req->execute(); 
		foreach($req->fetchALL() as $temp) {
			$event = new event();
			$event->setid_event($temp['id_event']);
			$event->setnom($temp['nom']);
			$event->setcode($temp['code']);
			$event->setdate_event($temp['date_event']);
			$event->setlieu($temp['lieu']);
			$list[]=$event;
			
		}
		return $list;
	}
	
	public static function findbyid($id){
		$db = Db::getInstance();
		$req = $db->prepare("select * from event where id_event= :id ");
		$req -> execute(array('id' => $id ));
		$temp = $req->fetch();
		$event = new Event();
		$event->setid_event($temp['id_event']);
		$event->setnom($temp['nom']);
		$event->setcode($temp['code']);
		$event->setdate_event($temp['date_event']);
		$event->setlieu($temp['lieu']);
		return $event;		
	}
	
	public function create($event)
	{
		$db = Db::getInstance();
		$req = $db->query("INSERT INTO `event`(`nom`, `code`, `date_event`, `lieu`) VALUES ('".$event->getnom()."' , '".$event->getcode()."' , '".$event->getdate_event()."'  , '".$event->getlieu()."' )");
	}
	
	public function index()
	{
		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="http://localhost/fyp_vf/back/view/tableevenement.php"</SCRIPT>';
	}
	
	public function update($event){
		$db = Db::getInstance();
		$req = $db -> query("UPDATE `event` SET `nom`='".$event->getnom()."',`code`='".$event->getcode()."',`date_event`='".$event->getdate_event()."' ,`lieu`='".$event->getlieu()."' where `id_event`= '".$event->getid_event()."' ");
	}
	
	public function remove($id){
		$db = Db::getInstance();
		$req = $db->query("DELETE FROM event where id_event= '".$id."' ");
	}
	
	
	
	
	
	
}
?>