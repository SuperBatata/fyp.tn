
<?php
// include database configuration file
require "header.php";


// initializ shopping cart class
include '../core/panierC.php';

$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
   
}




?>


      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="boutique.php">Boutique</a> <span class="mx-2 mb-0">/</span> <a href="viewCart.php">Panier</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Commande</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
       
        <div class="row">
          
          <div class="col-md-6">

            
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Votre commande</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Produit</th>
                      <th>Prix</th>
                      <th>Quantite</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php
                      if($cart->total_items() > 0){
                          //get cart items from session
                          $cartItems = $cart->contents();
                          $_SESSION['total']=$cart->total();
                          foreach($cartItems as $item){
                      ?>
                     
                      <tr>
                        <td><?php echo $item["nom"]; ?> </td>
                        <td><?php echo $item["prix"].' DT'; ?></td>
                        <td><?php echo $item["quantite"]; ?></td>
                        <td><?php echo $item["subtotal"].' DT'; ?></td>
       
                      </tr>
                      <?php } }else{ ?>
                        <tr><td colspan="4"><p>Panier Vide ! ......</p></td>
                        <?php } ?></tr>
                      <tr>
                        <td colspan="3"></td>
                        <?php if($cart->total_items() > 0){ ?>
                        <td class=""><strong>Total <?php echo $cart->total().' DT'; ?></strong></td>
                        <?php } ?> 
                      </tr>
                      
                    </tbody>
                  </table>

                 
                  <div class="form-group">
                    <a href="cartAction.php?action=placeOrder&prix=<?php echo $cart->total(); ?>" class="btn btn-primary btn-lg py-3 btn-block">Valider</a>
                  </div>

                  

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>

<?php require "footer.php"; ?>