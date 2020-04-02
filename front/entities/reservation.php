<?php 
class reservation
{
	public $id_reservation;
	
	public $date;
	public $nom;
	public $email;
	public $adress;
	public $typedereservation;
	

	function __construct($id_reservation,$nom,$email,$adress,$typedereservation)
	{	
		$this->id_reservation=$id_reservation;
		$this->nom=$nom;
		
		$this->email=$email;
		
		$this->adress=$adress;
		$this->typedereservation=$typedereservation;


    }
    
    
    function getid_reservation() {return $this->id_reservation ;}
    function getnom() {return $this->nom ;}
    function getemail() {return $this->email ;}
    function getdate() {return $this->date ;}
    
    function getadress() {return $this->adress ;}
    function gettypedereservation() {return $this->typedereservation ;}
    

    function setid_reservation($id_reservation) {$this->id_reservation=$id_reservation ;}
    function setnom($nom) {$this->nom=$nom ;}
    function setemail($email) {$this->email=$email ;}
    function setadress($adress) {$this->adress=$adress ;}   
    function setprix($typedereservation) {$this->typedereservation=$typedereservation ;}


}


 ?>