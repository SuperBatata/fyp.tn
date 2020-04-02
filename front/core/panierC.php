<?php 
	require '../config/config.php' ;
class Cart {
    protected $cart_contents = array();
    
    public function __construct(){
        // get the shopping cart array from the session
        $this->cart_contents = !empty($_SESSION['cart_contents'])?$_SESSION['cart_contents']:NULL;
        if ($this->cart_contents === NULL){
            // set some base values
            $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
        }
    }
    
    public function contents(){
        // rearrange the newest first
        $cart = array_reverse($this->cart_contents);

        // remove these so they don't create a problem when showing the cart table
        unset($cart['total_items']);
        unset($cart['cart_total']);

        return $cart;
    }
    
    
    public function get_item($row_id){
        return (in_array($row_id, array('total_items', 'cart_total'), TRUE) OR ! isset($this->cart_contents[$row_id]))
            ? FALSE
            : $this->cart_contents[$row_id];
    }
    
    public function total_items(){
        return $this->cart_contents['total_items'];
    }
    
    public function total(){
        return $this->cart_contents['cart_total'];
    }
    
    
    public function insert($item = array()){
        if(!is_array($item) OR count($item) === 0){
			
            return FALSE;
        }else{
            if(!isset($item['referance'], $item['nom'], $item['prix'], $item['quantite'])){
				
                return FALSE;
            }else{
                
                // prep the quantity
                $item['quantite'] = (float) $item['quantite'];
                if($item['quantite'] == 0){
                    return FALSE;
                }
                // prep the price
                $item['prix'] = (float) $item['prix'];
                // create a unique identifier for the item being inserted into the cart
                $rowid = $item['referance'];
                // get quantity if it's already there and add it on
                $old_quantite = isset($this->cart_contents[$rowid]['quantite']) ? (int) $this->cart_contents[$rowid]['quantite'] : 0;
                // re-create the entry with unique identifier and updated quantity
                $item['rowid'] = $rowid;
                $item['quantite'] += $old_quantite;
                $this->cart_contents[$rowid] = $item;
                
                // save Cart Item
				
                if($this->save_cart()){
                    return isset($rowid) ? $rowid : TRUE;
                }else{
                    return FALSE;
                }
            }
        }
    }
    
    public function update($item = array()){
        if (!is_array($item) OR count($item) === 0){
            return FALSE;
        }else{
            if (!isset($item['rowid'], $this->cart_contents[$item['rowid']])){
                return FALSE;
            }else{
                // prep the quantity
                if(isset($item['quantite'])){
                    $item['quantite'] = (float) $item['quantite'];
                    // remove the item from the cart, if quantity is zero
                    if ($item['quantite'] == 0){
                        unset($this->cart_contents[$item['rowid']]);
                        return TRUE;
                    }
                }
                
                // find updatable keys
                $keys = array_intersect(array_keys($this->cart_contents[$item['rowid']]), array_keys($item));
                // prep the price
                if(isset($item['prix'])){
                    $item['prix'] = (float) $item['prix'];
                }
                // product id & name shouldn't be changed
                foreach(array_diff($keys, array('referance', 'nom')) as $key){
                    $this->cart_contents[$item['rowid']][$key] = $item[$key];
                }
                // save cart data
                $this->save_cart();
                return TRUE;
            }
        }
    }
    
    
    protected function save_cart(){
        $this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0;
        foreach ($this->cart_contents as $key => $val){
            // make sure the array contains the proper indexes
            if(!is_array($val) OR !isset($val['prix'], $val['quantite'])){
                continue;
            }
     
            $this->cart_contents['cart_total'] += ($val['prix'] * $val['quantite']);
            $this->cart_contents['total_items'] += $val['quantite'];
            $this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['prix'] * $this->cart_contents[$key]['quantite']);
        }
        
        // if cart empty, delete it from the session
        if(count($this->cart_contents) <= 2){
            unset($_SESSION['cart_contents']);
            return FALSE;
        }else{
            $_SESSION['cart_contents'] = $this->cart_contents;
            return TRUE;
        }
    }
    
    
     public function remove($row_id){
        // unset & save
        unset($this->cart_contents[$row_id]);
        $this->save_cart();
        return TRUE;
     }
     
    
    public function destroy(){
        $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
        unset($_SESSION['cart_contents']);
    }
	function afficherCommande(){
		$sql="SElECT * From orders";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function confirmerCommande($id){
		$date=date("Y-m-d H:i:s");
		$timestamp=strtotime($date);
		var_dump($date) ;
		$sql="UPDATE orders SET status= 2 , modified=NOW() WHERE id=$id ";
		$db = config::getConnexion();
		try{
		$result=$db->query($sql);
		return $result;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
}