<?php
$sql_parties = "SELECT * FROM parties";
  
  //Fetching result from database
  $result_parties = mysqli_query($conn, $sql_parties);
  
  //Checking if there is data saved in the students table.
  if (mysqli_num_rows($result_parties) > 0) {
      // output data of each row
      $i = 0;
      // Looping through the results
      while($row = mysqli_fetch_assoc($result_parties)) {
        $parties[$i] = array(
          "party_id" => $row['party_id'],
          "party_name" => $row['party_name'],
        );
        $i++;
      }
  }


   $sql_position = "SELECT * FROM positions";
  
  //Fetching result from database
  $result_position = mysqli_query($conn, $sql_position);
  
  //Checking if there is data saved in the students table.
  if (mysqli_num_rows($result_position) > 0) {
      // output data of each row
      $i = 0;
      // Looping through the results
      while($row = mysqli_fetch_assoc($result_position)) {
        $positions[$i] = array(
          "position_id" => $row['position_id'],
          "position_name" => $row['position_name'],
        );
        $i++;
      }
  } 


?>
