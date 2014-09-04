<?php
require_once('ini_fn.php');

# dvote class
# coded by Alessandro Rosa
# e-mail : zandor_zz@yahoo.it
# site : http://malilla.supereva.it

# Copyright (C) 2006  Alessandro Rosa

# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 3 of the License, or
# any later version.

# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.

# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software Foundation,
# Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA

# Compiled with PHP 4.4.0

class dvote
{
    function dvote( $iniP )
    {
        $this->INIpath = $iniP ;
    }

    function generateVotingTable()
    {
          $question = get_params_ini( 'Globals', 'question', $this->INIpath );
          $entriesNUM = get_params_ini( 'Globals', 'entriesNUM', $this->INIpath );
          $expires = get_params_ini( 'Globals', 'expires', $this->INIpath );

          echo "<table class='vote'>\r\n";
          echo "\t\t<form name=\"voteFORM\" method=\"POST\" action=\"vote.php\">\r\n";
          echo "<tr><td style=\"height:7px;\"></td></tr>\r\n";
          echo "\t\t<tr><td><b>$question</b></td></tr>\r\n";
          echo "\t\t<tr><td style=\"height:3px;\"></td></tr>\r\n";
          echo "\t\t<tr><td class=\"expires\">( $expires )</td></tr>\r\n";
          echo "\t\t<tr><td style=\"height:10px;\"></td></tr>\r\n";
          
          for ( $i = 1; $i <= $entriesNUM ; $i++ )
          {
               $entry = get_params_ini( 'EntriesName', $i, $this->INIpath );
               echo "\t\t<tr><td class=\"vote\">";
               echo "<input style=\"vertical-align:middle;\" value=\"$i\" type=\"radio\" name=\"votingRADIO\" />";
               echo "$entry";
               echo "</td></tr>\r\n" ;
          }
          
          echo "\t\t<tr><td style=\"height:7px;\"></td></tr>\r\n";
          
          $btnLabel = $this->getVoteBtnLabel();
          
          echo "\t\t<tr><td><input class=\"votebtn\" type=\"submit\" value=\"$btnLabel\" /></td></tr>\r\n";
          echo "\t\t<tr><td style=\"height:7px;\"></td></tr>\r\n";
          echo "</table>\r\n";
    }

    function generateStatistics()
    {
          $question = $this->getQuestion();
          $entriesNUM = $this->getEntriesAmount();
          $votes = $this->getTotalVotes();

          echo "<table align=\"center\" class=\"vote\">\r\n";
          echo "<tr><td style=\"height:7px;\"></td></tr>\r\n";
          
          if ( !$this->checkVoter( "cookiename", "testtable" ) )
          {
               $errMSG = $this->getErrMSG() ;
               echo "<tr><td class=\"errMSG\" colspan=\"3\">$errMSG</td></tr>\r\n";
               echo "<tr><td style=\"height:7px;\"></td></tr>\r\n";
          }

          echo "<tr><td class=\"votetitle\" colspan=\"3\"><b>$question</b></td></tr>\r\n";
          echo "<tr><td style=\"height:7px;\"></td></tr>\r\n";

          $totalVotesLabel = $this->getTotalVotesLabel();
          echo "<tr><td colspan=\"3\">$totalVotesLabel: <b>$votes</b></td></tr>\r\n";

          echo "<tr><td style=\"height:7px;\"></td></tr>\r\n";

          $full = 100.0 ;
          
          for ( $i = 1 ; $i <= $entriesNUM ; $i++ )
          {
                $reply = get_params_ini( 'EntriesName', $i, $this->INIpath );
                $votesPERentry = get_params_ini( 'EntriesVotes', $i, $this->INIpath );
          
                $perc = $votesPERentry / $votes * 100.0 ;
                $perc = round( $perc, 1 );
                
                if ( $i < $entriesNUM ) $full -= $perc ;
          
                echo "<tr><td class=\"percentage\"><b>$reply</b></td>" ;

                if ( $i < $entriesNUM ) echo $this->bar($perc) ;
                else echo $this->bar($full) ;
          
                if ( $i < $entriesNUM ) echo "<td class=\"percentage\">$perc %</td></tr>\r\n";
                else echo "<td class=\"percentage\">$full %</td></tr>\r\n";
          }
          
          echo "<tr><td style=\"height:7px;\"></td></tr>\r\n";
          echo "</table>\r\n";
    }

    function bar( $perc )
    {
          echo "<td class=\"bar\" style=\"width:100px;\">\r\n";
          echo "\t\t\t<table class=\"bar\">\r\n";
          echo "\t\t\t<tr>";

          $perc = round( $perc, 0 );

          echo "<td style=\"width:".$perc."px;\" class=\"dotbar\"></td>";

          $rest = 100 - $perc ;
          echo "<td style=\"width:".$rest."px;\" class=\"restbar\"></td>";
          echo "</tr>" ;

          echo "\t\t\t</table>\r\n";
          echo "</td>\r\n";
    }


    function vote( $voteENTRYindex )
    {
        $votes = get_params_ini( 'Globals', 'votes', $this->INIpath );
        $votes++;
        set_params_ini( 'Globals', 'votes', $votes, $this->INIpath );
        
        $votesPERentry = get_params_ini( 'EntriesVotes', $voteENTRYindex, $this->INIpath );
        $votesPERentry++ ;
        set_params_ini( 'EntriesVotes', $voteENTRYindex, $votesPERentry, $this->INIpath );
    }
  
    function getTotalVotes()  {  return get_params_ini( 'Globals', 'votes', $this->INIpath );  }
    function getEntriesAmount()  {  return get_params_ini( 'Globals', 'entriesNUM', $this->INIpath );  }
    function getEntryVotes( $entryINDEX )  {  return get_params_ini( 'EntriesVotes', $entryINDEX, $this->INIpath );  }
    function getErrMSG()  { return get_params_ini( 'Globals', 'errorMSG', $this->INIpath );  }
    function getQuestion()  { return get_params_ini( 'Globals', 'question', $this->INIpath );  }
    function getVoteBtnLabel()  { return get_params_ini( 'Globals', 'voteBtnLabel', $this->INIpath );  }
    function getTotalVotesLabel()  { return get_params_ini( 'Globals', 'totalVotesLabel', $this->INIpath );  }

    function setVoteBtnLabel( $label )  { return set_params_ini( 'Globals', 'voteBtnLabel', $label, $this->INIpath );  }
    function setTotalVotesLabel( $label )  { return set_params_ini( 'Globals', 'totalVotesLabel', $label, $this->INIpath );  }

    // General entry get function, for customizable initialization files
    function getEntry( $section, $entry  )  { return get_params_ini( $section, $entry, $this->INIpath );  }

    function checkVoter( $cookieNAME, $yourvalue )
    {
        if ( isset( $_COOKIE[ $cookieNAME ] ) ) return false ;
        else
        {
            setcookie( $cookieNAME, $yourvalue );
            return true ;
        }
    }

  
    var $INIpath ;
}

?>
