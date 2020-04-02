
<?php


include "../config2.php";



class transC
{
	function ajouterT($trans)
	{
		$sql="insert into transaction (id_client,nom_client,dateT,total) values (:id_client,:nom_client,:dateT,:total)";
		$db=config::getConnexion();
		try
		{
			$req=$db->prepare($sql);
			
			$id_client=$trans->getid_client();
			$nom_client=$trans->getnom_client();
			$total=$trans->gettot();
			$dateT=$trans->getdateT();
			$req->bindValue(':id_client',$id_client);
			$req->bindValue(':nom_client',$nom_client);
			$req->bindValue(':total',$total);
			$req->bindValue(':dateT',$dateT);
			$req->execute();

return 1;



		}
		catch(Exception $e)
		{
			echo 'Erreur' .$e->getMessage();
		}
	}

	function afficherT()
	{
		$sql="select * from transaction";
		$db=config2::getConnexion();
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

	function stat(){
		$sql="SELECT nom_client,total FROM transaction group by nom_client";
		$db = config2::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
           
        }
	}
}