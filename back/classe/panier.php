<?php 
class panier
{
	private $id_panier;
	private $id_client;
	private $nom_produit;
	private $nom_client;
	private $dateP;
	private $quantite;
	private $prix;
	private $total;

	function __construct($id_client,$nom_client,$nom_produit,$quantite,$prix)
	{	
		$this->id_client=$id_client;
		$this->nom_client=$nom_client;
		$this->nom_produit=$nom_produit;
		$this->quantite=$quantite;
		$this->dateP=date("Y-m-d");
		$this->prix=$prix;
		$this->total=$prix * $quantite;


	}
    function getid_panier() {return $this->id_panier ;}
    function getid_client() {return $this->id_client ;}
    function getnom_client() {return $this->nom_client ;}
    function getnom_produit() {return $this->nom_produit ;}
    function getqt() {return $this->quantite ;}
    function getprix() {return $this->prix ;}
    function gettot() {return $this->total ;}
    function getdateP() {return $this->dateP ;}

    function setidc($id_client) {$this->id_client=$id_client ;}
    function setnom_client($nom_client) {$this->nom_client=$nom_client ;}
    function setnom_produit($nom_produit) {$this->nom_produit=$nom_produit ;}
    function setqt($quantite) {$this->quantite=$quantite ;}   
    function setprix($prix) {$this->prix=$prix ;}


}


 ?>