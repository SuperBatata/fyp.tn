<?php 
class service
{
	public $id_service;
	
	public $nom_offre;
	public $type_service;
	
	public $features;
	public $prix;
	

	function __construct($id_service,$nom_offre,$type_service,$features,$prix)
	{	
		$this->id_service=$id_service;
		$this->nom_offre=$nom_offre;
		
		$this->type_service=$type_service;
		
		$this->prix=$prix;
		$this->features=$features;


    }
    
    
    function getid_service() {return $this->id_service ;}
    function getnom_offre() {return $this->nom_offre ;}
    function gettype_service() {return $this->type_service ;}
    
    function getprix() {return $this->prix ;}
    function getfeature() {return $this->features ;}
    

    function setid_s($id_service) {$this->id_service=$id_service ;}
    function setnom_offre($nom_offre) {$this->nomoffre=$nom_offre ;}
    function settype_service($type_service) {$this->type_service=$type_service ;}
    function setfeature($features) {$this->features=$features ;}   
    function setprix($prix) {$this->prix=$prix ;}


}


 ?>