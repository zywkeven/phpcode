<?php 

class mysql{
    
    private $host;
    private $name;
    private $password;
    private $mpdb;
    private $utf;
    
    function __construct($host,$name,$password,$mpdb,$utf=''){
        $this->host=$host;
        $this->name=$name;
        $this->password=$password;
        $this->mpdb=$mpdb;
        $this->utf=$utf;
        $this->connect();
    }
    
    function connect(){
        $link=mysql_connect($this->host,$this->name,$this->password)or die($this->error());
        mysql_select_db($this->mpdb,$link)or die("There is no this database:".$this->mpdb);
        if ($this->utf <>'') {
            echo 'aaaaaaa';
            mysql_query("SET NAMES $this->utf");
        }
    }
    
    function query($sql,$type=""){
        if(!($query=mysql_query($sql))) {
            $this->show("Error：",$sql); 
        }
        return $query;
    }
    
    function show($message="",$sql=""){
        if(!$sql) {
            echo $message;
        }
        else {
            echo $message."<br>".$sql;
        }
    }
    
    function affected_rows(){
        return mysql_affected_rows(); 
    }
    
    function result($query,$row){
        return mysql_result($query,$row); 
    }
    
    function num_rows($query){
        return mysql_num_rows($query); 
    }
    
    function num_fields($query){
        return mysql_num_fields($query); 
    }
    
    function free_result($query){
        return mysql_free_result($query); 
    }
    
    function insert_id(){
        return mysql_insert_id(); 
    }
    
    function fetch_row($query){
        return mysql_fetch_row($query); 
    }
    
    function fetch_array($query){
        return mysql_fetch_array($query); 
    }
    
    function version(){
        return mysql_get_server_info(); 
    }
    
    function close(){
        return mysql_close(); 
    }
    
}

header('Content-type:text/html; charset=utf-8');
$db=new mysql("localhost","pgm2","pgm2","pgm2","utf8");
$result=$db->query("select mainName from test_charset");
while($row=$db->fetch_array($result)){
    echo $row['mainName'].'<br>';
}
?>