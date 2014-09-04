<?php

function numberrotate($lengthlarge,$widthlarge,$lengthsmall,$widthsmall,$distance,$image,$color)
{  
     $numtotal=0; 
    $lengthleft1=$lengthlarge;
    $lengthleft2=$lengthlarge; 
    
    $widthleft1=$widthlarge;
    $widthleft2=$widthlarge;
   
    $lengthleftlast=$lengthlarge;
    $widthleftlast=$widthlarge; 
//-----------------------------------------------------------------------------------------------     
    if($widthleft1>=($lengthsmall+$distance*2)&&($lengthleft1>=($widthsmall+$distance*2)))
    {   
        $lengthleftlast-=$widthsmall+$distance;
        $lengthleft1-=($widthsmall+$distance);
        
    while($widthleft1>=($lengthsmall+$distance*2))
    {
        $numtotal+=1;
       // ImageRectangle($image,($lengthlarge-$lengthleft2)+$distance,($widthlarge-$widthleft2+$distance),
      // ($lengthlarge-$lengthleft2+$distance+$widthsmall),($widthlarge-$widthleft2+$distance+$lengthsmall),$color); 
       
        $widthleft1-=($lengthsmall+$distance);    
    }  
    }
//--------------------------------------------------------------------------------------------------    
    if($widthleft1<$widthsmall+$distance*2)
        $lengthleft2-=$widthsmall+$distance; 
    
    if($lengthleft2>=($lengthsmall+$distance*2)&&$widthlarge>=($widthsmall+$distance*2))
    { 
        $widthleftlast-=$widthsmall+$distance;
        while($lengthleft2>=($lengthsmall+$distance*2))
    {
        $numtotal+=1;
         
        $lengthleft2-=($lengthsmall+$distance);    
    } 
    } 
//----------------------------------------------------------------------------------------------------    
    
     if($lengthleft2<$widthsmall+$distance*2)
     $widthleft2-=$widthsmall+$distance; 
     
     if($lengthleftlast>=($widthsmall+$distance*2)&&$widthleft2>=($lengthsmall+$distance*2))
     {
         $lengthleftlast-=$widthsmall+$distance; 
         
         while($widthleft2>=($lengthsmall+$distance*2))
         {
         
            $numtotal+=1; 
            $widthleft2-= $lengthsmall+$distance;
         }  
     }
//----------------------------------------------------------------------------------------------------     
     if($widthleft2<$widthsmall+$distance*2)
     $lengthleft1-=$widthsmall+$distance;
     
     if($lengthleft1>=($lengthsmall+$distance*2)&&$widthleftlast>=($widthsmall+$distance*2))
       {
           $widthleftlast-=$widthsmall+$distance;
            while($lengthleft1>=$lengthsmall+$distance*2)
            {
                
                $numtotal+=1;
                $lengthleft1-=$lengthsmall+$distance;
            }
       }  
       
    
      if($numtotal)
       return  $last=array(0=>"$lengthleftlast",1=>"$widthleftlast",2=>"$numtotal"); 
      else
      return 1;  
     
      
      
      
      
}

$lengthlarge=55;
$widthlarge=55;
$lengthsmall=10; 
$widthsmall=5;
$distance=5;

$widthleftmap=$widthlarge;
  
$numlast=0; 
$image = Imagecreate($lengthlarge+100,$widthlarge+100); 

$color = ImageColorAllocate($image,255,0,0); 
$white = ImageColorAllocate($image,255,255,255); 

ImageFill($image,0,0,$white);       
ImageRectangle($image,0,0,$lengthlarge+1,$widthlarge+1,$color); 
    
 while(is_array($numfirst=numberrotate($lengthlarge,$widthlarge,$lengthsmall,$widthsmall,$distance,$image,$color))) 
 {  
    reset($numfirst); 
    list($key1,$value1)=each($numfirst);
     $lengthleft=$value1;
    list($key2,$value2)=each($numfirst);
     $widthleft=$value2;
    list($key3,$value3)=each($numfirst);
     $numlast+=$value3; 
     
     $lengthlarge=$lengthleft;
     $widthlarge=$widthleft;
 }   
 
   echo $numlast;
   
       /*
imagestring($image,6,5,$widthleftmap+2,"TOTAL:".$numlast,$color);  
  
ImageGIF($image);   
  
ImageDestroy($image); 
      
//echo $numlast;
        */
?>