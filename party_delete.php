<?php
    include "document.php";
   
    if($_GET){
        $party_id = $_GET['party_id'];
        $sql = "DELETE  FROM parties  WHERE party_id = $party_id";
        // echo $sql;
        if(mysqli_query($conn, $sql)){
            header('Location:http://localhost/web/party_fetch.php');
            exit();
        }
        else
        {
            echo "Error deleting record: " . $conn->error;
        }
        
    }
    mysqli_close($conn);
?>