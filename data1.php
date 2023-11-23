d
 <?php
header('Content-Type: application/json');

include'document.php';
$sqlQuery2="SELECT parties.party_name,  FROM ballots INNER JOIN parties ON ballots.party_id = parties.party_id";
$sqlQuery1 = "SELECT bt_id,party_id,number_of_vote FROM ballots ORDER BY bt_id";


$result1 = mysqli_query($conn,$sqlQuery1);
$result2 = mysqli_query($conn,$sqlQuery2);

$data1 = array();
foreach ($result1 as $row1) {
	$data1[] = $row1;
 }






mysqli_close($conn);


echo json_encode($data1);



?>