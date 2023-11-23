<?php
  include 'document.php';
  
  session_start();

  if($_GET)
  {
    $party_id = $_GET['pid'];
    $provision = $_GET['provision'];
    $position_id = $_GET['posid'];
    $candidate_name = $_GET['cname'];
    $citizen_id = $_SESSION['citizen'];
    include 'fetching.php';
    include 'fetching1.php';
    $sql_area = "Select address from tb_users where citizen_number='$citizen_id'";

    $result_area = mysqli_query($conn,$sql_area);
    $rowA = mysqli_fetch_assoc($result_area);
    $address = $rowA['address'];

    $area = Array(
              Array('bhojpuri','illam','dhankuta','jhapa','morang','khotang'),
              Array('parsa','bara','rautahat','siraha','dhanusha','saptari'),
              Array('sindhuli','bhaktapur','kathmandu','lalitpur','nuwakot','rasuwa'),
              Array('baglung','gorkha','kaski','lamjung','manang','mustang'),
              Array('kapilvastu','parasi','rupandehi','arghakhanchi','gulmi','palpa')
             
            );
      $provision=trim($provision, "'");
      intval($provision);
 for ($i=0; $i < 6; $i++) {
        // echo $address."==".$area[$provision-1][$i]."<br>";
        if(strcmp($address,$area[$provision-1][$i]) == 0){
          // echo "location";
         $location = true;
          break;
        }else{
          // echo "false"."<br>";
          $location = false;
        }
      }

    // echo $location;

             




    if(isset($_SESSION['status']))
    {
      if($_SESSION['status'] == 0 && $location == true)
      {
        // vote ++ garne thau
        $getVote = "Select number_of_vote from ballots where party_id = $party_id and position_id=$position_id and candidate_name = $candidate_name";
       // echo $getVote;
        $result7 = mysqli_query($conn, $getVote);
  
        if (mysqli_num_rows($result7) > 0) 
        {
          $row = mysqli_fetch_assoc($result7);
          $voteNo = $row['number_of_vote'];  
        }
        $voteNo = $voteNo +1;
        $putVote = "UPDATE ballots set number_of_vote = $voteNo where party_id = $party_id and position_id=$position_id and candidate_name = $candidate_name";
        
        if(mysqli_query($conn, $putVote))
        {
          $updateStatus = "UPDATE tb_users set status='1' where citizen_number = '$citizen_id' ";
          
          if(mysqli_query($conn,$updateStatus))
          {
              header("location:http://localhost/web/result1.php?provision=$provision");
          }
         
        }
      }
      else if($location == true){
       echo "<script>alert('you have already vote');window.history.back();</script>";
      }
      else if($location == false){
        echo "<script>alert('Your are not from this provision');window.history.back();</script>";
      }
    }
  }  

  



?>