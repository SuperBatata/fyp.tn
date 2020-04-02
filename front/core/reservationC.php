<?php
include "../config4.php";

class reservationC
{
	function ajouterreservation($reservation)
	{
      
$conection=mysqli_connect('localhost','root','','fyp');            
		
			$id_reservation=$reservation->getid_reservation();
			$date=$reservation->getdate();
			$nom=$reservation->getnom();
			$adress=$reservation->getadress();
			$typedereservation=$reservation->gettypedereservation();

            $sql="INSERT into reservation (id_reservation,date,nom,email,adress,typedereservation)
			values ('$id_reservation','$date','$nom','$email','$adress','$typedereservation')";
			 var_dump($sql);
			$create=mysqli_query($conection,$sql);
	}

	function afficherreservation()
	{
		$sql="select * from reservation";
		$db=config::getConnexion();
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

	function supprimerreservation($id_reservation)
	{

		$sql="DELETE FROM reservation where id_reservation=:id_reservation";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_reservation',$id_reservation);
		try{
            $req->execute();
          //header('Location: panierBE.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


// 	function modifierservice($service,$id_service)
// 	{

// 		 $sql="UPDATE service1 SET id_service=:id_service,type_service=:type_service, prix=:prix,features=:features, nom_offre=:nom_offre WHERE id_service=:id_service";
		
// 		$db = config::getConnexion();
// try{		
//         $req=$db->prepare($sql);
//         $id_service=$service->getid_service();
// 			$type_service=$service->gettype_service();
// 			$nom_offre=$service->getnom_offre();
// 			$prix=$prix->getprix();	
//             $features=$service->getfeatures();
            
// 		$datas = array(':id_service'=>$id_service,':type_service'=>$type_service,':prix'=>$prix,':features'=>$features,':nom_offre'=>$nom_offre);
		
// 			$req->bindValue(':id_service',$id_service);
// 			$req->bindValue(':type_service',$type_service);
// 			$req->bindValue(':prix',$prix);
// 			$req->bindValue(':features',$features);
// 			$req->bindValue(':nom_offre',$nom_offre);
			
// 			$req->execute();
			
//            // header('Location: index.php');
//         }
//         catch (Exception $e){
//             echo " Erreur ! ".$e->getMessage();
//    echo " Les datas : " ;
//   print_r($datas);
//         }
// 	}

	function getid($id_reservation){
		$sql="SELECT * from reservation where id_reservation=$id_reservation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	// function getsomme(){
	// 	$sql="SELECT SUM(total) from panier";
	// 	$db = config::getConnexion();
	// 	try{
	// 	$sum=$db->query($sql);
	// 	return $sum;
	// 	}
    //     catch (Exception $e){
    //         die('Erreur: '.$e->getMessage());
    //     }
	// }
	
}