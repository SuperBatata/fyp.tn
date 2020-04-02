<?php
require_once "../config/config.php";
class ProduitC
{
	
    
    public function ajouterProduit($e)
    {
    	$referance=$e->getRef();
    	$nom=$e->getNom();
    	$prix=$e->getPrix();
    	$description=$e->getDescription();
    	$quantite=$e->getQuant();
        $categorie=$e->getCat();
        $img=$e->getImg();
        

    	$sql = "INSERT INTO produit (referance,nom,prix,description,categorie,quantite,img)
VALUES ('$referance','$nom',$prix,'$description','$categorie',$quantite,'$img')";

$c=config::getConnexion();
$c->exec($sql);

    }
    public function afficherProduit()
    {
    	$c=config::getConnexion();
    	$sql = "SELECT * FROM produit";

 return $result = $c->query($sql);

}
public function afficherUnProduit()
    {
        
        $sql = "SELECT * FROM produit ";
        $c=config::getConnexion();
       $result = $c->query($sql);
       

 return $result ;

 
   
    
       
}

public function afficherParCategorie ($categorie){
    $sql="SELECT * FROM produit WHERE categorie = '".$categorie."'";
    $db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}

public function RecupererProduit($referance){
		$sql="SELECT * from Produit where (referance=$referance)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
function getre()
{
    $c=config::getConnexion();
        $sql = "SELECT * FROM produit";

 return $result = $c->query($sql);

}
 public function supprimerProduit($referance)	
 {
 	$c=config::getConnexion();
 	$sql = "DELETE  FROM `produit` WHERE `referance`=:referance";





     





     $req= $c->prepare($sql);
 	$req->bindValue(':referance',$referance);
$req->execute();

 }
 function modifierProduit($e){
        $sql="UPDATE produit SET referance=:referance, nom=:nom,prix=:prix,description=:description,categorie=:categorie,quantite=:quantite WHERE referance=:referance";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
     $referance=$e->getRef();
        $nom=$e->getNom();
        $prix=$e->getPrix();
        $description=$e->getDescription();
        $quantite=$e->getQuant();
        $categorie=$e->getCat();
        $img=$e->getImg();

        $datas = array(':referance'=>$referance, ':referance'=>$referance, ':nom'=>$nom,':prix'=>$prix,':description'=>$description,':quantite'=>$quantite,':categorie'=>$categorie,':img'=>$img);
        $req->bindValue(':referance',$referance);
        $req->bindValue(':referance',$referance);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':description',$description);
        $req->bindValue(':quantite',$quantite);
        $req->bindValue(':categorie',$categorie);
        $req->bindValue(':img',$img);
        
            $s=$req->execute();
            
           
        }
        catch (Exception $z){
            echo " Erreur ! ".$z->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
}
