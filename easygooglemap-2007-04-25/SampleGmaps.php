<?php
require'EasyGoogleMap.class.php';
$gm = new EasyGoogleMap("ABQIAAAAoM-kEW8yHxWwveOZAouVXhTkQdzC1XuexHlQDsWmu58XcfHJ8xQB-xtA9nt_7NDWTsfJfHHxosdNZg");
$gm->SetMarkerIconStyle('STAR');
$gm->SetMapZoom(10);
$gm->SetAddress("10 market st, san francisco");
$gm->SetInfoWindowText("This is the address # 1.");

//$gm->SetAddress("Manila, Philippines");
$gm->SetAddress("Manila, Philippines");
$gm->SetInfoWindowText("This is Philippine Country.");
$gm->SetSideClick('Philippines');
?>
<html>
<head>
<title>EasyGoogleMap</title>
<?php echo $gm->GmapsKey(); ?>
</head>
<body>
<?php echo $gm->MapHolder(); ?>
<?php echo $gm->InitJs(); ?>
<?php echo $gm->GetSideClick(); ?>
<?php echo $gm->UnloadMap(); ?>
</body>
</html>