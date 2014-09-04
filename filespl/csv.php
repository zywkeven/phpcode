<?php
$it = new splfileobject ('ab.csv');
foreach ($it as $line){
    echo $line.'<Br>';
}
$it = new splfileobject ('ab.csv');
while ($array = $it->fgetcsv()){
    var_export($array);
    echo 'aa<br>';    
}

?>