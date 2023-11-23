<?php
include 'document.php';
// include 'fetching2.php';
 


  $sql_ballot1="SELECT parties.party_name as pname, positions.position_name as posname FROM ((ballots INNER JOIN parties ON ballots.party_id = parties.party_id) INNER JOIN positions ON ballots.position_id = positions.position_id )";


   

  //Fetching result from database
  $result_ballot_1= mysqli_query($conn, $sql_ballot1);
 
  if (mysqli_num_rows($result_ballot_1) > 0 ) {
      // output data of each row
      $i = 0;
      // Looping through the results
      while($row1 = mysqli_fetch_assoc($result_ballot_1)) {
        $pp[$i] = array($row1['pname'],$row1['posname']);
        $i++;
      }
      // echo "            ".print_r($pp[1][]);
  } 
  
?>