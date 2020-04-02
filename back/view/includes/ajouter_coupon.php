<?php
include "../../classe/coupon.php";
include "../../core/couponC.php";

if (isset($_POST['dateE'])) {
    $x = strtotime($_POST['dateE']);
    $z = date("Y-m-d", $x);
    $y = date("Y-m-d");
    //var_dump($z);
    if ($z < $y) {
        echo "<script type='text/javascript'>";
        echo "alert('Date non respectee');";
        echo "</script>";
        echo "<META http-equiv='refresh' content='0;URL=../commande.php'>";
        
    } else {
        if (isset($_POST['nomc']) && isset($_POST['valeur']) && isset($_POST['dateE'])) {
            $coupon  = new coupon($_POST['nomc'], $_POST['valeur'], $_POST['dateE']);
            $couponC = new couponC();
            $couponC->ajouter($coupon);
            
            echo "<META http-equiv='refresh' content='0;URL=../commande.php'>";
            
        }
        echo "<script type='text/javascript'>";
        echo "alert('Coupon ajouté');";
        echo "</script>";
    }
    
    
    //header('Location: ../commande.php');
    
    
}

?>