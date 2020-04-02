<?php
require_once('connexion.php');
class image
{
    private $id_image;
    private $nom;
    private $size;
    private $width;
    private $height;
    private $type;
    private $lien;
    private $id_event;
    function __construct()
    { }

    public function getid_image()
    {return $this->id_image;}
    public function getnom()
    {return $this->nom;}
    public function getsize()
    {return $this->size;}
    public function getwidth()
    {return $this->width;}
    public function getheight()
    {return $this->height;}
    public function gettype()
    {return $this->type;}
    public function getlien()
    {return $this->lien;}
    public function getid_event()
    {return $this->id_event;}
     
	public function setid_image($id_image)
    {$this->id_image=$id_image;}
    public function setnom($nom)
    { $this->nom=$nom;}
    public function setsize($size)
    {$this->size=$size;}
    public function setwidth($date)
    {$this->width=$date;}
    public function setheight($height)
    { $this->height=$height;}
    public function settype($type)
    { $this->type=$type;}
    public function setlien($lien)
    { $this->lien=$lien;}
    public function setid_event($id_event)
    { $this->id_event=$id_event;}
	
	
}