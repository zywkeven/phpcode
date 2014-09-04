<meta charset='utf-8'>
<?php        
if(isset($_POST['p1'])){ 
    $exename='win.exe';
    $command=$exename." ".escapeshellcmd(base64_encode($_POST['p1']).' '.base64_encode($_POST['p2']).' '.base64_encode($_POST['p3']));
    passthru($command); 
}    
?>
<form method="post" action=''>
<input type='text' name='p1'>
<input type='text' name='p2'>
<input type='text' name='p3'>
<input type='submit' name='btn' value='submit'>
</form>