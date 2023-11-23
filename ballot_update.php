<?php
    //including the configuration file.
    include 'document.php';
    include 'fetching.php';

    // //If something has been posted from the form
    if($_POST){
        // print_r($_POST);
       $candidate_name = $_POST['candidate_name'];
       $position_id=$_POST['ps_id'];
        $party_id=$_POST['pt_id'];
        
        $provision=$_POST['provision'];
        $bt_id = $_POST['bt_id'];
        $sql = "UPDATE ballots SET candidate_name = '$candidate_name',
         party_id = '$party_id', position_id = '$position_id',provision ='$provision' WHERE bt_id = '$bt_id'";
        if(mysqli_query($conn, $sql)){
            echo "Record updated successfully.";
            header('Location: http://localhost/web/ballot_fetch.php');
            mysqli_close($conn);
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    if($_GET){
        $bt_id = $_GET['bt_id'];
        $p_id=$_GET['p_id'];
        $pos_id=$_GET['pos_id'];
        $provision=$_GET['provision'];
        $sql = "SELECT * FROM ballots WHERE bt_id = '$bt_id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $ballot = array(
                    "bt_id" => $row['bt_id'],
                    "candidate_name" => $row['candidate_name'],
                    "party_id" => $row['party_id'],
                    "position_id" => $row['position_id'],
                );
            }
        } 
          else {
          echo "No records found!!";
          exit;
        }
        // print_r($student);exit;
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      Fieldset and label example
    </title>
  </head>
  <body>
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
    <form name="meroform" id="myform" method="POST" >
      <fieldset style="width:400px; height: 460px; background-color: beige;">
         <h1>Vote Form</h1>
            <h2>Candidate Name:</h2>
           <input type="hidden" name="bt_id" value="<?=$ballot['bt_id']?>" />
              <input
                type="text"
                name="candidate_name"
                id="candidate_name"
                value = "<?=$ballot['candidate_name']?>"
                required
              /><br>
           <h2>Party Name:</h2>
            <select name="pt_id">
             <?php foreach($parties as $index => $party) {?>
                <option value="<?=$party['party_id']?>" <?php if ($party['party_id']==$p_id)
                {
                  echo 'selected';
                }?> ><?=$party['party_name']?></option>
                <?php }?>
            </select >
            <h2>Position Name:</h2>
            <select name="ps_id">
             <?php foreach($positions as $index => $position) {?>
                <option value="<?=$position['position_id']?>"<?php if ($position['position_id']==$pos_id)
                {
                  echo 'selected';
                }?>><?=$position['position_name']?></option>
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
           <button   id="sub"  onclick="return validation();">Submit</button>
        
      </fieldset>
     </form> 
  </body>

  <style>
    #myform
    {
     margin-left: 720px;
     margin-top: 100px;
     

    
     
    }
    #myform h1
    {
      text-align: center;
      font-weight: bold;
      font-family: sans-serif;
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
      font-size: 20px;
      border: 3px solid black;
      border-radius: 44px;
      text-align: center;
      
      
    }
    select
    {
      width: 298px;
      font-size: 25px;
      margin-top: -1000px;
      margin-left: 40px;
      text-align-last: center;

    }
    option
    {
      font-size: 25px;
      direction: ;
    }
    input:hover
    {
      border-color: #ffc400ec; 
    }
    #sub
    {
      margin-top: 30px;
      margin-left: 100px;
      width: 140px;
      height: 50px;
      font-weight: bold;
      font-size: 22px;
      color: black;
      border: 3px solid black ;
      border-radius: 40px;
   
    }
    #sub:hover
    {
      background-color: #ffc400ec;
    }
    
  </style>
</html>
