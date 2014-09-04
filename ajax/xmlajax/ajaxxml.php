<?php

//Creates XML string and XML document using the DOM
 $dom = new DomDocument('1.0');
 
 //add root - <books>
 $books = $dom->appendChild($dom->createElement('maindir'));
 
 //add <book> element to <books>
 mysql_connect("127.0.0.1",'pgm2','pgm2');
 mysql_select_db("pgm2");
 
//  $book2 = $books->appendChild($dom->createElement('url'));  
 //add <title> element to <book> 
 
  $query="select sub from step where main='$_GET[id]'"; 
 $result=mysql_query($query);
 $i=0;
 while($row=mysql_fetch_array($result))
 {   $var='book'.$i;
 $book = $books->appendChild($dom->createElement('subdir'));
 
 $title1 = $book->appendChild($dom->createElement('subinf1'));
 $title2 = $book->appendChild($dom->createElement('subinf2'));
  
 $title1->appendChild($dom->createTextNode("id=$_GET[id]")); 
  $title2->appendChild($dom->createTextNode("main=$row[sub]"));   
  $i++;
 //add <title> text node element to <title>  
 }
 
 //generate xml
 $dom->formatOutput = true; // set the formatOutput attribute of
 //domDocument to true
 // save XML as string or file
 $test1 = $dom->saveXML(); // put string in test1
 $dom -> save('test1.xml'); // save as file

 ?>