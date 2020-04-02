<?php
require_once('connexion.php');
class Event
{
    private $id_event;
    private $nom;
    private $code;
    private $date_event;
    private $lieu;
	
    function __construct()
    { }

    public function getid_event()
    {return $this->id_event;}
    public function getnom()
    {return $this->nom;}
    public function getcode()
    {return $this->code;}
    public function getdate_event()
    {return $this->date_event;}
    public function getlieu()
    {return $this->lieu;}
     
	public function setid_event($id_event)
    {$this->id_event=$id_event;}
    public function setnom($nom)
    { $this->nom=$nom;}
    public function setcode($code)
    {$this->code=$code;}
    public function setdate_event($date)
    {$this->date_event=$date;}
    public function setlieu($lieu)
    { $this->lieu=$lieu;}
	
	
}