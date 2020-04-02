<?php
include "../config4.php";

class couponC
{
	function ajouter($coupon)
	{
		$sql="insert into coupon (nom_coupon,valeur,dateA,dateE,etat) values (:nom_coupon,:valeur,:dateA,:dateE,:etat)";
		$db=config4::getConnexion();
		try
		{
			$req=$db->prepare($sql);
			$nom_coupon=$coupon->getNom_coupon();
			$valeur=$coupon->getValeur();
			$dateA=$coupon->getDateA();
			$dateE=$coupon->getDateE();
			$etat=$coupon->getEtat();

			$req->bindValue(':nom_coupon',$nom_coupon);
			$req->bindValue(':valeur',$valeur);
			$req->bindValue(':dateA',$dateA);
			$req->bindValue(':dateE',$dateE);
			$req->bindValue(':etat',$etat);
			$req->execute();





		}
		catch(Exception $e)
		{
			echo 'Erreur' .$e->getMessage();
		}
	}

	function affichercoupon()
	{
		$sql="select * from coupon";
		$db=config4::getConnexion();
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

	function supprimercoupon($id_coupon)
	{

		$sql="DELETE FROM coupon where id_coupon=:id_coupon";
		$db = config4::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_coupon',$id_coupon);
		try{
            $req->execute();
          //header('Location: panierBE.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


	function modifiercoupon($coupon,$id_coupon)
	{

		 $sql="UPDATE coupon SET nom_coupon=:nom_coupon, valeur=:valeur, dateE=:dateE WHERE id_coupon=:id_coupon";
		
		$db = config4::getConnexion();
try{		
        $req=$db->prepare($sql);
		$nom_coupon=$coupon->getNom_coupon();
        $valeur=$coupon->getvaleur();
        $dateE=$coupon->getDateE();
		$datas = array(':nom_coupon'=>$nom_coupon,':valeur'=>$valeur,':dateE'=>$dateE);
		$req->bindValue(':id_coupon',$id_coupon);
		$req->bindValue(':nom_coupon',$nom_coupon);	
		$req->bindValue(':valeur',$valeur);
		$req->bindValue(':dateE',$dateE);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        } 
	}

	function getid($id_coupon){
		$sql="SELECT * from coupon where id_coupon=$id_coupon";
		$db = config4::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function getnom($nom_coupon){
		$sql="SELECT * from coupon where nom_coupon=$nom_coupon";
		$db = config4::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
           
        }
	}
	function stat(){
		$sql="SELECT etat, sum(etat) FROM coupon group by etat";
		$db = config4::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
           
        }
	}

	
	
} 