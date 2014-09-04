<?php
/****
 * This file is a example of gmapPlotter Class
 * Req : PHP5, Simple XML , Google map api key for your site
****/

require("gmapPlotter.php");
$mapObj = new googleMapGeocoder();
$address = "Taj mahal ,Agra, India";
$latlonArr  = $mapObj->geocodeAddress($address);
#print_r($latlonArr);
?>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=your gmap api key here"
      type="text/javascript">
</script>
<html>
    <head>
        <title> Google Map </title>
     </head>
    <body>
        <div id="map" style="width: 500px;height:400px"></div>
        <?php
            // plot the map with default marker icon
            echo $mapObj->plotgoogleMap($latlonArr);
        ?>
    </body>
</html>


