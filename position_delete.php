<?php
    include "document.php";
   
    if($_GET){
        $position_id = $_GET['position_id'];
        $sql = "DELETE  FROM positions  WHERE position_id = $position_id";
        // echo $sql;
        if(mysqli_query($conn, $sql)){
            header('Location:http://localhost/web/position_fetch.php');
            exit();
        }
        else
        {
            echo "Error deleting record: " . $conn->error;
        }
        
    }
    mysqli_close($conn);
?>