<?php
/**
* Implementation of a New Graph Coloring Algorithm
*
* @PHPVER  :  5.0
* @author  :  MA Razzaque Rupom <rupom_315@yahoo.com>, <rupom.bd@gmail.com>
*             Moderator, phpResource (http://groups.yahoo.com/group/phpresource/)
*             URL: http://www.rupom.info  
*        
* @version :  1.0
* Date     :  05/16/2006
* Purpose  :  Coloring Connected Graph with a New Approach 
*/

require_once "GraphColoring.class.php";

//When source is file
$col = new GraphColoring();
//Data from file
$col->initSource("graph.txt","file");
$col->initGraph();
$col->initColoring();
$col->displayColorResult();

//When source is DB
$newCol = new GraphColoring();
//Data from DB
$newCol->initSource("graph","DB");
$newCol->initGraph();
$newCol->initColoring();
$newCol->displayColorResult();

?>