<?php 
class coupon
{
	private $id_coupon;
	private $valeur;
	private $nom_coupon;
	private $dateA;
	private $dateE;
	private $etat;

	function __construct($nom_coupon,$valeur,$dateE)
	{
		
		$this->nom_coupon=$nom_coupon;
		$this->valeur=$valeur;
		$this->dateA=date("Y-m-d");
		$this->dateE=$dateE;
		$this->etat=0;

	}
	function getId_coupon() {return $this->id_coupon ;}
    function getNom_coupon() {return $this->nom_coupon ;}
    function getValeur() {return $this->valeur ;}
    function getDateE() {return $this->dateE ;}
    function getDateA() {return $this->dateA ;}
    function getEtat() {return $this->etat ;}

    function setNom_coupon($nom_coupon) {$this->nom_coupon=$nom_coupon ;}
    function setValeur($valeur) {$this->valeur=$valeur ;}
    function setDateE($dateE) {$this->dateE=$dateE ;}
    function setEtat($etat) {$this->etat=$etat ;}


}


 ?>