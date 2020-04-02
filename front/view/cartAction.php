<?php

    session_start();

// initialize shopping cart class
include '../core/panierC.php';
include "../entities/produit.php";
include "../core/produitC.php";
/*include "../core/transC.php";
include "../entities/trans.php";*/


$cart = new Cart;
$produit = new ProduitC;


// include database configuration file
if(isset($_REQUEST['action']) && !empty($_REQUEST['action']) && $_SESSION['auth']){
    
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        //$client = $_SESSION['auth'];
        /*
        $transaction = new transC($_SESSION['id'],$_SESSION['username'],$cart->total());
        $transactionV = $transaction->ajouterT($transaction);*/
        // get product details
        
        $db=config::getConnexion();

		$q="SELECT * FROM produit WHERE referance = ".$productID ;
        $query = $db->query($q);
        $row = $query->fetch(PDO::FETCH_ASSOC);
		
		
        $itemData = array(
            'referance' => $row['referance'],
            'nom' => $row['nom'],
            'prix' => $row['prix'],
            'quantite' => 1
        );
		
        
        $insertItem = $cart->insert($itemData);

        $redirectLoc = $insertItem?'viewCart.php':'acceuil.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
		

        $monProduit=$produit->RecupererProduit($_REQUEST['id']);
		foreach ( $monProduit as $p )
		{
		if($p['quantite']<$_REQUEST['quantite'])
		{ echo 'Produit epuisée' ;}
		
		else
		{
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'quantite' => $_REQUEST['quantite']
        );
        $updateItem = $cart->update($itemData);
		echo $updateItem?'ok':'err';die;}
		}
        
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }
    elseif($_REQUEST['action'] == 'placeOrder' && !empty($_REQUEST['prix']) && $_SESSION['auth'] ){
        $db=config::getConnexion();
        
        // ajout transaction base 
        $sql="insert into transaction (id_client,nom_client,dateT,total) values (:id_client,:nom_client,:dateT,:total)";
        $req=$db->prepare($sql);
        $req->bindValue(':id_client',$_SESSION['id']);
		$req->bindValue(':nom_client',$_SESSION['username']);
		$req->bindValue(':total',$_REQUEST['prix']);
		$req->bindValue(':dateT',date("Y-m-d"));
        $req->execute();
        $_SESSION['flash']['success'] = "Votre achat a bien été valider ";
        header("Location: boutique.php");
    }
}else{
    header("Location: login.php");
}