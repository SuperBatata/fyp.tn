<?PHP
include "../config.php";
class clientC {
function afficherClient ($Client){
		echo "username: ".$Client->getUsername()."<br>";
		echo "Nom: ".$Client->getNom()."<br>";
		echo "Prénom: ".$Client->getPrenom()."<br>";
		echo "téléphone: ".$Client->getTelephone()."<br>";
		echo "adresse mail: ".$Client->getAdresse()."<br>";
        echo "mot de passe: ".$Client->getPassword()."<br>";
                
	}

	function ajouterClient($Client){
		$sql="insert into client (username,nom,prenom,email,adresse,telephone,password) values (:username, :nom, :prenom, :email, :adresse, :telephone, :password)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $username=$Client->getUsername();
        $nom=$Client->getNom();
        $prenom=$Client->getPrenom();
        $email=$Client->getEmail();
        $adresse=$Client->getAdresse();
        $password=$Client->getPassword();
        $telephone=$Client->getTelephone();
	
		$req->bindValue(':username',$username);
		$req->bindValue(':nom',$nom);
        $req->bindValue(':prenom',$prenom);
        $req->bindValue(':email',$email);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':telephone',$telephone);
		$req->bindValue(':password',$password);
		
            $req->execute(); 
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherClients1(){
		//$sql="SElECT * From Client e inner join formationphp.Client a on e.id= a.id";
		$sql="SELECT * From client ORDER BY telephone DESC";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function triertabclients(){
		//$sql="SElECT * From Client e inner join formationphp.Client a on e.id= a.id";
		$sql="SELECT * From clients ORDER BY nom";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function afficherClients2(){
		//$sql="SElECT * From Client e inner join formationphp.Client a on e.id= a.id";
		$sql="SELECT * From Client ORDER BY telephone DESC";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function afficherClients(){
		//$sql="SElECT * From Client e inner join formationphp.Client a on e.id= a.id";
		$sql="SElECT * From Client";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerClient($username){
		$sql="DELETE FROM client where username= :username";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':username',$username);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierClient($Client,$username){
		$sql="UPDATE clients SET username=:usernamee, nom=:nom,prenom=:prenom,email=:email,adresse=:adresse,telephone=:telephone,password=:password WHERE username=:username";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$usernamee=$Client->getUsername();
        $nom=$Client->getNom();
        $prenom=$Client->getPrenom();
        $email=$Client->getEmail();
        $adresse=$Client->getAdresse();
        $telephone=$Client->getTelephone();
        $password=$Client->getPassword();
        

           $datas = array(':usernamee'=>$usernamee, ':username'=>$username, ':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':adresse'=>$adresse,':telephone'=>$telephone, ':password'=>$password);
		$req->bindValue(':usernamee',$usernamee);
		$req->bindValue(':username',$username);
		$req->bindValue(':nom',$nom);
        $req->bindValue(':prenom',$prenom);
        $req->bindValue(':email',$email);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':telephone',$telephone);
		$req->bindValue(':password',$password);
		
		
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }
		
	}
	function recupererClient($username){
		$sql="SELECT * from client where username='".$username."'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
}

?>