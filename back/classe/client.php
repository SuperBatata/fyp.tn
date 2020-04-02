<?PHP
class Client{
	private $username;
	private $nom;
    private $prenom;
    private $email;
	private $telephone;
	private $adresse;
    private $password;
    
	function __construct($username,$nom,$prenom,$email,$adresse,$telephone,$password){
		$this->username=$username;
		$this->nom=$nom;
        $this->prenom=$prenom;
        $this->$email=$email;
		$this->telephone=$telephone;
		$this->password=$password;
		$this->adresse=$adresse;
	}
	
	function getId(){
		return $this->id;
	}
	function getUsername(){
		return $this->username;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
    }
    function getEmail(){
		return $this->email;
	}
	function getAdresse(){
		return $this->adresse;
	}
	function getTelephone(){
		return $this->telephone;
	}
        function getPassword(){
		return $this->password;
	}
       

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
    }
    function setEmail($email){
		$this->email;
	}
	function setId($id){
		$this->id=$id;
	}
	function setTelephone($telephone){
		$this->telephone=$telephone;
	}
	function setAdresse($adresse){
		$this->adresse=$adresse;
	}
	
	function setPassword($password){
		$this->password=$password;
	}
	function setUsername($username){
		$this->username=$username;
	}
	
}

?>