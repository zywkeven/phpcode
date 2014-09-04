<?php

/**
 * treeview.class.php
 *
 * @version $Id$
 * @copyright 2009
 */

/**
 * The class is based on a self referencing hierarchical database.
 * The database must contain an 'id' field (int) which holds the primary key
 * and a 'parent' field (int), which holds a reference to the parent record
 * where it belongs to. You may or may not have a single root record.
 * The lowest level (root) record(s) have zero in the 'parent' field, and the
 * first record in the database begins with 1 (one) as the 'id'. Conveniently
 * the 'id' field is autoincrementing. And for performance reason, the 'parent'
 * field should be indexed. Additionally you need a 'disp' field which holds
 * the text to be displayed in the tree. This field can also be in a related
 * table, when you specify your own query to retrieve the branch nodes. In this
 * case you need to qualify the field name with the table name containing it.
 *
 * The class retrieves all records belonging to a given parent id and generates
 * HTML to be displayed at the current position, consisting the symbols for
 * open and closed nodes and the text from the 'disp' field. A corresponding
 * javascript file makes the AJAX call neccessary to retrieve a node when
 * clicking on the plus symbol of the tree.
 *
 * Additionally, you can define a javascript function which serves the actions
 * you need when clicking on the text of the node, usually an AJAX call to
 * display the data selected with the node.
 *
 */
class treeView{

	public $table;					// Hierarchical Tree Table Name
	public $fDisp;					// Name of the text field to be displayed

	public $jFunct = '';			// Javascript Function called by clicking at the text of the node
	public $fParent = 'parent'; 	//Field Name of parent field
	public $sortOrder = '';			// optional sort order fields

	function __construct($pTable, $pDisp, $pFunct=''){
		$this->table = $pTable;
		$this->jFunct = $pFunct;
		$this->fDisp = $pDisp;
	}

	/*
	 * This function returns the container div where the treeview element resides
	 */
	function treeView(){
		$s = "<div id=\"treeView\">";
		$s .= $this->treeNode(0, 'false');
		$s .= "</div>";
		return  $s;
	}

	function treeNode($parentId, $pLast, $sq=NULL){
		if (!$sq) {
			$ord = ($this->sortOrder ? " order by $this->sortOrder" : '');
			$sq = "select $this->table.id as mid, $this->table.$this->fDisp as display,
						(select
							 count(*) from $this->table
							where $this->table.$this->fParent = mid
							group by $this->table.$this->fParent
						) as sub
					from $this->table
					where $this->table.$this->fParent = $parentId $ord";
		}
		$aTb = $this->getTable($sq);
		$nTb = count($aTb);
		$nLa = $nTb-1;
		$iTb = 0;
		$click = " onclick=\"tree.sel_node(this, '$this->jFunct')\"";
		$s = '';
		$cLastClass = ($pLast=='true' ? "class=\"lastNode\"": '');
		$s .= "<ul $cLastClass id=\"n_$parentId\">";

		foreach($aTb as $aItem){
			$cLast = ($iTb==$nLa ? 'true' : 'false');
			$s .= "<li id=\"m_$aItem[mid]\">";
			if ($aItem['sub']) {
				$nodeImg = ($iTb==$nLa ? 'pLastNode' : 'pNode');
				$nodeSym = 'tree_node_closed';
			} else {
				$nodeImg = ($iTb==$nLa ? 'lLastNode' : 'lNode');
				$nodeSym = 'tree_node_leaf';
			}
			$s .= "<div onclick=\"tree.show_node('m_$aItem[mid]', 1, $cLast)\" class=\"tree_node tree_node_$nodeImg\"></div>";
			$s .= "<div id=\"s_$aItem[mid]\" class=\"tree_symbol $nodeSym\"$click></div>";
			$s .= "<div id=\"t_$aItem[mid]\" class=\"tree_text\" title=\"$aItem[display]\"$click>$aItem[display]</div>";
			$s .= "</li>";

			$iTb++;
		}
		$s .= "</ul>";
		return $s;
	}

	/*
	 * Reaads a query into an Array of records.
	 */
	private function getTable($sq) {
		$rs = mysql_query($sq);
		$aResult = array();
		while($aRec = mysql_fetch_assoc($rs)){
			$aResult[] = $aRec;
		} // while
		return $aResult;
	}
}


?>