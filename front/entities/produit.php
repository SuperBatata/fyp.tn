<?php
class Produit{
	private $referance;
	private $nom;
	private $prix;
	private $description;
	private $categorie;
	private $quantite;
	private $img;
	public function __construct($referance,$nom,$prix,$description,$categorie,$quantite,$img)/*on peur avoir q'un sel constructeur*/ 
	{
		$this->referance=$referance;
        $this->nom=$nom;
	    $this->prix=$prix;
	    $this->description=$description;
        $this->categorie=$categorie;
        $this->quantite=$quantite;
        $this->img=$img;
	}
	public function getRef(){return $this->referance ;}
	public function getNom(){return $this->nom ;}
	public function getPrix(){return $this->prix ;}
	public function getDescription(){return $this->description ;}
	public function getCat(){return $this->categorie ;}
	public function getImg(){return $this->img ;}
	public function getQuant(){return $this->quantite ;}
	public function setRef($referance){$this->referance=$referance;}
	public function setNom($nom){$this->nom=$nom;}
	public function setPrix($prix){$this->prix=$prix;}
	public function setDescription($description){$this->description=$description;}
	public function setCat($categorie){$this->categorie=$categorie;}
		public function setQuant($quantite){$this->quantite=$quantite;}
		public function setImg($img){$this->img=$img;}
	}
	?>