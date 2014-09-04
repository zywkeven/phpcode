<?php

function numberrotate($lengthlarge,$widthlarge,$lengthsmall,$widthsmall,$distance)
{  
     $numtotal=0; 
    
    //if(($lengthlarge>=($lengthsmall+$distance*2)&&($widthlarge>=($widthsmall+$distance*2)))||
   // $widthlarge>=($lengthsmall+$distance*2)&&($lengthlarge>=($widthsmall+$distance*2))) 
   
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
       
    //  numberrotate($lengthleftlast,$widthleftlast,$lengthsmall,$widthsmall,$distance);  
      if($numtotal)
       return  $last=array(0=>"$lengthleftlast",1=>"$widthleftlast",2=>"$numtotal"); 
      else
      return 1;
      
}

$lengthlarge=60;
$widthlarge=55;
$lengthsmall=5; 
$widthsmall=10;
$distance=5;



 $numlast=0; 
       
 while(is_array($numfirst=numberrotate($lengthlarge,$widthlarge,$lengthsmall,$widthsmall,$distance))) 
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

?>