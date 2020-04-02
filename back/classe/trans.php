<?php

class trans
{
	private $id_trans;
	private $id_client;
	private $nom_client;
	private $dateT;
	private $total;

	function __construct($id_client,$nom_client,$total)
	{	
		$this->id_client=$id_client;
		$this->nom_client=$nom_client;
		$this->dateT=date("Y-m-d");
		$this->total=$total;


	}
    function getid_trans() {return $this->id_trans ;}
    function getid_client() {return $this->id_client ;}
    function getnom_client() {return $this->nom_client ;}
    function gettot() {return $this->total ;}
    function getdateT() {return $this->dateT ;}

    function setidc($id_client) {$this->id_client=$id_client ;}
    function setnom_client($nom_client) {$this->nom_client=$nom_client ;}


}