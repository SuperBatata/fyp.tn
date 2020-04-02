<?php


include "../config1.php";

class panierC
{
	function ajouterprod($panier)
	{
		$sql="insert into panier (id_panier,id_client,nom_client,nom_produit,quantite,prix,total,dateP) values (:id_panier,:id_client,:nom_client,:nom_produit,:quantite,:prix,:total,:dateP)";
		$db=config1::getConnexion();
		try
		{
			$req=$db->prepare($sql);
			$id_panier=$panier->getid_panier();
			$id_client=$panier->getid_client();
			$nom_client=$panier->getnom_client();
			$nom_produit=$panier->getnom_produit();
			$prix=$panier->getprix();
			$total=$panier->gettot();
			$dateP=$panier->getdateP();
			$quantite=$panier->getqt();
			$req->bindValue(':id_panier',$id_panier);
			$req->bindValue(':id_client',$id_client);
			$req->bindValue(':nom_client',$nom_client);
			$req->bindValue(':nom_produit',$nom_produit);
			$req->bindValue(':quantite',$quantite);
			$req->bindValue(':prix',$prix);
			$req->bindValue(':total',$total);
			$req->bindValue(':dateP',$dateP);
			$req->execute();





		}
		catch(Exception $e)
		{
			echo 'Erreur' .$e->getMessage();
		}
	}

	function afficherprod()
	{
		$sql="select * from panier";
		$db=config1::getConnexion();
		try
		{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e)
		{
			echo 'Erreur' .$e->getMessage();
		}
	}

	function supprimerprod($id_panier)
	{

		$sql="DELETE FROM panier where id_panier=:id_panier";
		$db = config1::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_panier',$id_panier);
		try{
            $req->execute();
          //header('Location: panierBE.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


	function modifierpanier($panier,$id_panier)
	{

		 $sql="UPDATE panier SET id_client=:id_client, nom_client=:nom_client, quantite=:quantite,nom_produit=:nom_produit, dateP=:dateP WHERE id_panier=:id_panier";
		
		$db = config1::getConnexion();
try{		
        $req=$db->prepare($sql);
        $id_panier=$panier->getid_panier();
			$id_client=$panier->getid_client();
			$nom_client=$panier->getnom_client();
			$nom_produit=$panier->getnom_produit();
			$prix=$panier->getprix();
			$dateP=$panier->getdateP();
		$datas = array(':id_panier'=>$id_panier,':id_client'=>$id_client,':nom_client'=>$nom_client,':nom_produit'=>$nom_produit,':quantite'=>$quantite,':prix'=>$prix,':dateP'=>$dateP);
		$req->bindValue(':id_panier',$id_panier);
		$req->bindValue(':id_client',$id_client);
			$req->bindValue(':nom_client',$nom_client);
			$req->bindValue(':nom_produit',$nom_produit);
			$req->bindValue(':quantite',$quantite);
			$req->bindValue(':prix',$prix);
			$req->bindValue(':dateP',$dateP);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
	}

	function getid($id_panier){
		$sql="SELECT * from panier where id_panier=$id_panier";
		$db = config1::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function getsomme(){
		$sql="SELECT SUM(total) from panier";
		$db = config1::getConnexion();
		try{
		$sum=$db->query($sql);
		return $sum;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
}