 <?php
 include 'document.php';
 $sql_ballot = "SELECT * FROM ballots where provision=$provision";
 $result_ballot = mysqli_query($conn, $sql_ballot);
  if (mysqli_num_rows($result_ballot) > 0 ) {
      // output data of each row
      $i = 0;
      // Looping through the results
      while($row = mysqli_fetch_assoc($result_ballot)) {
        $ballots[$i] = array(
          "bt_id"=>$row['bt_id'],
          // "party_name"=>$row1['pname'],
          // "position_name"=>$row1['posname'],
           "position_id" => $row['position_id'],
         "party_id"=>$row['party_id'],
         
          "candidate_name" => $row['candidate_name'],
          
          "number_of_vote" => $row['number_of_vote'],
         
         
        );
        $i++;
      }
  } 
 ?>