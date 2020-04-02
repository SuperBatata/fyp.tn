<?php
require_once "../config.php";
class ProduitC
{
	function ajouterprod($produit){
        $db = config::getConnexion();
        $sql = "INSERT INTO produit VALUES (:referance,:nom,:prix,:quantite,:img,:description,:id_categorie)";
        $req = $db->prepare($sql);
        $req->bindValue(':referance',$produit->getRef());
        $req->bindValue(':nom',$produit->getNom());
        $req->bindValue(':prix',$produit->getPrix());
        $req->bindValue(':quantite',$produit->getQuant());
        $req->bindValue(':img',$produit->getImg());
        $req->bindValue(':description',$produit->getDescription());
        $req->bindValue(':id_categorie',$produit->getId_categorie());
        $req->execute();
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
 function supprimerProduit($referance){
    $sql="DELETE FROM produit where referance= :referance";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':referance',$referance);
    try   {
        $req->execute();
       // header('Location: index.php');
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage()); }
}














 function modifierProduit($e,$referance){
        $sql="UPDATE produit SET referance=:referance, nom=:nom,prix=:prix,quantite=:quantite,img=:img,description=:description ,id_categorie=:id_categorie WHERE referance=:referance";
        
        $db = config::getConnexion();
        
try{        
        $req=$db->prepare($sql);
     $referance=$e->getRef();
        $nom=$e->getNom();
        $prix=$e->getPrix();
        $quantite=$e->getQuant();
        $img=$e->getImg();
        $description=$e->getDescription();
        $id_categorie=$e->getId_categorie();

        $datas = array(':referance'=>$referance, ':referance'=>$referance, ':nom'=>$nom,':prix'=>$prix,':quantite'=>$quantite,':img'=>$img,':description'=>$description);
        $req->bindValue(':referance',$referance);
        $req->bindValue(':referance',$referance);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':quantite',$quantite);
        $req->bindValue(':img',$img);
        $req->bindValue(':description',$description);
        $req->bindValue(':id_categorie',$id_categorie);
            $s=$req->execute();
            
           
        }
        catch (Exception $z){
            echo " Erreur ! ".$z->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
}

?>
