<?php

require __DIR__.'/../app/autoload.php';


function getAllVotes($id)
 {

 $votes = array();
 $q = "SELECT * FROM entries WHERE id = $id";
 $r = mysql_query($q);
 if(mysql_num_rows($r)==1)//id found in the table
  {
  $row = mysql_fetch_assoc($r);
  $votes[0] = $row['votes_up'];
  $votes[1] = $row['votes_down'];
  }
 return $votes;
 }
