<?php

include "../classe/image.php";
class imageController {
	
	public static function all(){
		$list= [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM `image` order by `id_image`');
		foreach($req->fetchALL() as $temp) {
			$image = new image();
			$image->setid_image($temp['id_image']);
			$image->setnom($temp['nom']);
			$image->setsize($temp['size']);
			$image->setwidth($temp['width']);
            $image->setheight($temp['height']);
            $image->settype($temp['type']);
            $image->setlien($temp['lien']);
            $image->setid_event($temp['id_event']);
			$list[]=$image;
			
		}
		return $list;
	}
	
	public static function allwithSearch($category,$value){
		$list= [];
		$db = Db::getInstance();
		$req = $db->prepare("SELECT * FROM `image` where ".$category." = '".$value."' order by `id_image`");
		$req->execute(); 
		foreach($req->fetchALL() as $temp) {
			$image = new image();
			$image->setid_image($temp['id_image']);
			$image->setnom($temp['nom']);
			$image->setsize($temp['size']);
			$image->setwidth($temp['width']);
            $image->setheight($temp['height']);
            $image->settype($temp['type']);
            $image->setlien($temp['lien']);
            $image->setid_event($temp['id_event']);
			$list[]=$image;
			
		}
		return $list;
	}
	
	public static function findbyid($id){
		$db = Db::getInstance();
		$req = $db->prepare("select * from image where id_image= :id ");
		$req -> execute(array('id' => $id ));
		$temp = $req->fetch();
		$image = new image();
		$image->setid_image($temp['id_image']);
			$image->setnom($temp['nom']);
			$image->setsize($temp['size']);
			$image->setwidth($temp['width']);
            $image->setheight($temp['height']);
            $image->settype($temp['type']);
            $image->setlien($temp['lien']);
            $image->setid_event($temp['id_event']);
		return $image;		
	}
	
	public function create($image)
	{
		$db = Db::getInstance();
		$req = $db->query("INSERT INTO `image`(`nom`, `size`, `width`, `height`, `type`, `lien`, `id_event`) VALUES ('".$image->getnom()."' , '".$image->getsize()."' , '".$image->getwidth()."'  , '".$image->getheight()."'  , '".$image->gettype()."'  , '".$image->getlien()."'  , '".$image->getid_event()."' )");
	}
	
	public function index()
	{
		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="http://localhost/fyp_vf/back/view/viewimage.php"</SCRIPT>';
	}
	
	public function update($image){
		$db = Db::getInstance();
		$req = $db -> query("UPDATE `image` SET `nom`='".$image->getnom()."',`size`='".$image->getsize()."',`width`='".$image->getwidth()."' ,`height`='".$image->getheight()."' ,`type`='".$image->gettype()."' ,`lien`='".$image->getlien()."' ,`id_event`='".$image->getid_event()."' where `id_image`= '".$image->getid_image()."' ");
	}
	
	public function remove($id){
		$db = Db::getInstance();
		$req = $db->query("DELETE FROM image where id_image= '".$id."' ");
	}
	
	
	
	
	
	
}
?>