<?php
    include "document.php";
   
    if($_GET){
        $bt_id = $_GET['bt_id'];
        $sql = "DELETE  FROM ballots  WHERE bt_id = $bt_id";
        // echo $sql;
        if(mysqli_query($conn, $sql)){
            header('Location:http://localhost/web/ballot_fetch.php');
            exit();
        }
        else
        {
            echo "Error deleting record: " . $conn->error;
        }
        
    }
    mysqli_close($conn);
?>