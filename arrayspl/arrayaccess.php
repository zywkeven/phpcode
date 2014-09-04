<?php 
class myarray implements ArrayAccess {
    
    protected $_arr;
    
    public function __construct () {
        $htis->_arr = array ();
    }
    
    public function offsetSet ($offset, $value) {
        $this->_arr[$offset] = $value;
    }
    
    public function offsetGet ($offset) {
        return $this->_arr[$offset];        
    }
    
    public function offsetExists ($offset) {
        return array_key_exists ($offset, $this->_arr);
    }
    
    public function offsetUnset ($offset) {
        unset ($this->_arr[$offset]);
    }    
}

$myArray = new Myarray();
$myArray['first'] = 'test';
$demo = $myArray['first'];
unset ($myArray['first']);