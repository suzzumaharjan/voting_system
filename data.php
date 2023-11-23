<?php
header('Content-Type: application/json');

include'document.php';
// include 'fetching1.php';


$sqlQuery = "SELECT bt_id,candidate_name,number_of_vote FROM ballots  ORDER BY bt_id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}






mysqli_close($conn);

echo json_encode($data);




?>