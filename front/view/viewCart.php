<?php require "header.php"; ?>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

<?php


include '../core/panierC.php';
$cart = new Cart;

?>
    <script>
    function updateCartItem(obj,id){
     

        $.get("cartAction.php", {action:"updateCartItem", id:id, quantite:obj.value}, function(data){
            if(data){
            console.log(data);
               location.reload();
            }else{
                alert(data);
            }
        });
    }
    </script>



  
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-name">Produit</th>
                    <th class="product-price">Prix</th>
                    <th class="product-quantity">Quantite</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    if($cart->total_items() > 0){
                        //get cart items from session
                        $cartItems = $cart->contents();
                  
                        foreach($cartItems as $item){
                    ?>
                  <tr>
                   
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $item["nom"]; ?></h2>
                    </td>
                    <td><?php echo $item["prix"].' DT'; ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        
                        <input type="number" class="form-control text-center" value="<?php echo $item["quantite"]; ?>"  placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td><?php echo $item["subtotal"].' DT'; ?></td>
                    <td><a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-primary btn-sm" onclick="return confirm('Vous etes sur ?')">X</a></td>
                  </tr>

                  <?php } }else{ ?>
                    <tr><td colspan="5"><p>Le Panier Est Vide ...</p></td>
                    <?php } ?> 
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
             
              <div class="col-md-6">
                <a href="boutique.php" class="btn btn-outline-primary btn-sm btn-block">Retour vers boutique</a>
              </div>
            </div>
            
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Total pannier</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <?php if($cart->total_items() > 0){ ?>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><?php echo $cart->total().' DT'; ?></strong>
                  </div>
                  <?php } ?>
                </div>
               

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceed To Checkout</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php require "footer.php"; ?>