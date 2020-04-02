<?php

class image
{
    private $id_image;
    private $nom;
    private $size;
    private $width;
    private $height;
    private $lien; 
    private $id_event;
    
    


    function __construct($nom,$size,$width,$height,$lien,$id_event)
    {
        
           
        $this->nom=$nom;
        $this->size=$size;
        $this->width=$width;
        $this->height=$height;
        $this->lien=$lien;
        $this->$id_event=$id_event;

    }

    function getid_image()
    {return $this->id_image;}
    function getnom()
    {return $this->nom;}
    function getsize()
    {return $this->size;}
    function getwidth()
    {return $this->width;}
    function getheight()
    {return $this->height;}
    function getlien()
    {return $this->lien;}
    function getid_event()
    {return $this->id_event;}

    function setnom($nom)
    { $this->nom=$nom;}
    function setsize($size)
    {$this->size=$size;}
    function setwidth($width)
    {$this->width=$width;}
    function setheight($height)
    { $this->height=$height;}
    function setlien($lien)
    { $this->lien=$lien;}
    function setid_event($id_event)
    { $this->id_event=$id_event;}
     


}








?>