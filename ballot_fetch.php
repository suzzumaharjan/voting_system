
<?php
  include "document.php";
  include "dashboard.php";
  include "fetching2.php";
  // include"fetching.php";

    $sql_provision = "SELECT DISTINCT provision From ballots ORDER by provision";
    $result_provision = mysqli_query($conn,$sql_provision);
    
    if (mysqli_num_rows($result_provision) > 0) {
      // output data of each row
        $i = 0;  
      // Looping through the results
      while($row = mysqli_fetch_assoc($result_provision)) {
        $provision[$i] = $row['provision'];
        $i++;
      }
  }

  $total = array();
    // print_r($provision);
  for($j=0;$j<count($provision);$j++){
    $sql_ballot = "SELECT * FROM ballots where provision=$provision[$j]";
    $result_ballot = mysqli_query($conn, $sql_ballot);
    
  if (mysqli_num_rows($result_ballot) > 0 ) {
      $i=0;
      $ballots = array();
      while($row = mysqli_fetch_assoc($result_ballot)) {
        
      
        $pid = $row['party_id'];
        $sql_party = "SELECT party_name as pname from parties where party_id = $pid";
        
        $row1 = mysqli_fetch_assoc(mysqli_query($conn, $sql_party));
        $posid = $row['position_id'];
        $sql_position = "SELECT position_name as posname from positions where position_id = $posid";
        
        $row2= mysqli_fetch_assoc(mysqli_query($conn, $sql_position));


        $ballots[$i] = array(
          "bt_id"=>$row['bt_id'],
          "party_name"=>$row1['pname'],
         "position_name"=>$row2['posname'],
           "position_id" => $row['position_id'],
         "party_id"=>$row['party_id'],
         
          "candidate_name" => $row['candidate_name'],
          
          "number_of_vote" => $row['number_of_vote'],
          "provision"=>$row['provision'],
        );
        // print_r($ballots);
        // echo "<br>";
        
  
      $i++;
      }
      array_push($total, $ballots);
      // print_r($total);
      // echo "<br>";
  } 
      
  }
  if($_POST)
  {
    $candidate_name = $_POST['candidate_name'];
    $party_id=$_POST['pt_id'];
    $provision=$_POST['provision'];
    $position_id=$_POST['ps_id'];

     $sql_blt="insert into ballots (candidate_name,party_id,position_id,provision)values('$candidate_name','$party_id','$position_id','$provision')";
     if(mysqli_query($conn,$sql_blt))
     {
      header('Location: http://localhost/web/ballot_fetch.php');
     }
     else
     {
      echo"error";
     }

  }



  mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
      <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>
      <script>
         function validation()
         {
           var can_name=document.forms['meroform']['candidate_name'];
            if(can_name.value=="")
            {
              alert('enter the candidate name');
              return false;
            }
            else
            {
              return true;
            }
         }
       </script>
        <link rel="stylesheet" type="text/css" href="r.css">
        <!-- <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script> -->
  </head>
  <body>
    <form  name="meroform" id="myform" method="POST" action="ballot_fetch.php" >
      <fieldset style="width:340px; height: 400px; background-color: beige;">
         <h1>Vote Form</h1>
            <h2>Candidate Name:</h2>
           <input type="text" name="candidate_name"><br>

           <h2>Party Name:</h2>
            <select name="pt_id">
             <?php foreach($parties as $index => $party) {?>
                <option value="<?=$party['party_id']?>"><?=$party['party_name']?></option>
                <?php }?>
            </select>
            <h2>Position Name:</h2>
            <select name="ps_id">
             <?php foreach($positions as $index => $position) {?>
                <option value="<?=$position['position_id']?>"><?=$position['position_name']?></option>
                <?php }?>
            </select>
            <h2>Provision Name:</h2>
            <select name="provision">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
            </select>
           <button  id="sub"  onclick="return validation();">Submit</button>
        
      </fieldset>
     
    </form>
    <!-- <a href="student_form.html" class="move-right"><h3>Add new student</h3></a> -->
    <?php foreach($total as $i => $ballots){?>
      <h1 style="margin-left: 500px;margin-bottom: -30px;">Provision :<?=$provision[$i]?></h1> 
    <table >
        <tr>
            <th>S.N.</th>
            <th>Party Name</th>
            <th>Candidate Name</th>
            <th>Position Name</th>
            <th>Number of Vote</th>
             <th>Update</th>
              <th>Delete</th>
        </tr>
        <?php foreach($ballots as $index =>$ballot){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$ballot["party_name"]?></td>
            <td><?=$ballot['candidate_name']?></td>
            <td><?=$ballot['position_name']?></td>
            <td><?=$ballot['number_of_vote']?></td>
            <td>
                <a href="http://localhost/web/ballot_update.php?bt_id=<?=$ballot['bt_id']?>&p_id=<?=$ballot['party_id']?>&pos_id=<?=$ballot['position_id']?>&provision=<?=$ballot['provision']?>"><i class="fas fa-upload"></i></a>

            </td>
            <td>
                <a href="http://localhost/web/ballot_delete.php?bt_id=<?=$ballot['bt_id']?>"><i class="fas fa-envelope-open-text"></i></a>
            </td>
            
        </tr>
        <?php } ?>
    </table>
  <?php }?>
  </body>

  <style>
    #myform
    {
     margin-left: 620px;
     margin-top: 40px;

     

    
     
    }
    #myform h1
    {
      text-align: center;
      font-weight: bold;
      font-family: sans-serif;
      margin-top: -10px;
    } 
    #myform h2
    {
      font-size: 20px;
      font-weight: bold;
      font-family: sans-serif;
      margin-left:  13px;
     
    
    }
   input 
    {
      width: 300px;
      height: 40px;
      margin-top : -140px;
      margin-left: 40px;
      font-size: 23px;
      border: 3px solid black;
      border-radius: 44px;
      text-align: center;
      
      
    }
    select
    {
      width: 298px;
      font-size: 23px;
      margin-top: -1000px;
      margin-left: 40px;
      text-align-last: center;

    }
    option
    {
      font-size: 25px;
      
    }
    input:hover
    {
      border-color: #ffc400ec; 
    }
    #sub
    {
      margin-top: 20px;
      margin-left: 100px;
      width: 100px;
      height: 30px;
     
      font-size: 22px;
      color: black;
      border: 1px solid black ;
      border-radius: 40px;
   
    }
    #sub:hover
    {
      background-color: #ffc400ec;
    }
    table
    {
      margin-top: 60px;
    }
    table a
    {
     color: black;
    }
    
  </style>

</html>
