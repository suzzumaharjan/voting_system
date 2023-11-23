<?php
    //including the configuration file.
    include 'document.php';

    // //If something has been posted from the form
    if($_POST){
        // print_r($_POST);
        $party_name = $_POST['party_name'];
        $party_id = $_POST['party_id'];
        $sql = "UPDATE parties SET party_name = '$party_name'
        WHERE party_id = $party_id";
        echo $sql;
        if(mysqli_query($conn, $sql)){
            echo "Record updated successfully.";
            mysqli_close($conn);
            header('Location: http://localhost/web/party_fetch.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if($_GET){
        $party_id = $_GET['party_id'];
        $sql = "SELECT * FROM parties WHERE party_id = $party_id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $party = array(
                    "party_id" => $row['party_id'],
                    "party_name" => $row['party_name'],
                );
            }
        } else {
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
            var par_name=document.forms['meroform']['party_name'];
            if(par_name.value=="")
            {
              alert('enter the party name');
              return false;
            }
            else
            {
              return true;
            }
         }
       </script>
    <form name="meroform" id="myform" method="POST" >
      <fieldset style="width:100px; height: 260px; background-color: beige;">
          <h1>party form</h1>
            <p>Party_Name:</p>
           <input type="hidden" name="party_id" value="<?=$party['party_id']?>" />
            <input
                type="text"
                placeholder="Enter your full name"
                name="party_name"
                id="party_name"
                value = "<?=$party['party_name']?>"
                required
              /><br>
              <button   id="sub" onclick="return validation();" >Submit</button>
      </fieldset>
    </form>
  </body>

  <style>
    #myform
    {
     margin-left: 600px;
     margin-top: 100px;
     

    
     
    }
    #myform h1
    {
      text-align: center;
      font-weight: bold;
      font-family: sans-serif;
    } 
    #myform p
    {
      font-size: 25px;
      font-weight: bold;
      font-family: sans-serif;
      margin-left:  13px;
     
    
    }
   input 
    {
      width: 300px;
      height: 40px;
      margin-top : -140px;
      margin-left:  12px;
      font-size: 20px;
      border: 3px solid black;
      border-radius: 44px;
      text-align: center;
      
      
    }
    input:hover
    {
      border-color: #ffc400ec; 
    }
    #sub
    {
      margin-top: 20px;
      margin-left: 90px;
      width: 140px;
      height: 50px;
      font-weight: bold;
      font-size: 28px;
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
