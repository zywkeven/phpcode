<?php
class product {
    protected $_partNumber, $_description, $_price;
    
    public function __construct ($partNumber, $description, $price) {
        $this->_partNumber = $partNumber;
        $this->_description = $description;
        $this->_price = $price;        
    }
    
    public function getPartNumber () {
        return $this->_partNumber;
        
    }
    
    public function getDescription () {
        return $this->_description;
    }
    
    public function getPrice () {
        return $this->_price;
        
    }
}

class Cart extends ArrayObject {
    protected $_products;
    
    public function __construct () {
        $this->_products = array ();
        parent::__construct ($this->_products);
    }
    
    public function getCartTotal () {
        for ($i = $sum = 0, $cnt = count ($this); $i < $cnt; $sum += $this[$i++]->getPrice ());
        return $sum;
    }  
}

$cart = new Cart ();
$product = new product('012-3','Descritpion',1.99);
$cart[] = $product; 
$product = new product('werwer3','Descritpion2',2);
$cart[] = $product;
echo $cart->getCartTotal();
print_r ($cart);
?>