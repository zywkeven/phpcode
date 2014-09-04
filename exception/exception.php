<?php

@parse_url ('http://');
$a = new Exception ("Error message");
throw $a;

?>