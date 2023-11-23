<?php
    //including the configuration file.
    include 'document.php';

    // //If something has been posted from the form
    if($_POST){
        // print_r($_POST);
        $position_name = $_POST['position_name'];
        $position_id = $_POST['position_id'];
        $sql = "UPDATE positions SET position_name = '$position_name'  WHERE position_id = '$position_id'";
    
        if(mysqli_query($conn, $sql)){
            echo "Record updated successfully.";
            mysqli_close($conn);
            header('Location: http://localhost/web/position_fetch.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if($_GET){
        $position_id = $_GET['position_id'];
        $sql = "SELECT * FROM positions WHERE position_id = $position_id";
      
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $position= array(
                    "positon_id" => $row['position_id'],
                    "position_name" => $row['position_name'],
                );
            }
        } else {
          echo "No records found!!";
          exit;
        }
        
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
          var pos_name=document.forms['meroform']['position_name'];
          if(pos_name.value=="")
          {
            alert('enter the position name');
            return false;
          }
          else
          {
            return true;
          }
         }
       </script>
    <form name="meroform" id="myform" method="POST" >
        <fieldset style="width:240px; height: 260px; background-color: beige;">
         <h1>Position Form</h1>
            <p>Position Name:</p>
           <input type="hidden" name="position_id" value="<?=$position['position_id']?>" />
              <input
                type="text"
                name="position_name"
                id="position_name"
                value = "<?=$position['position_name']?>"
                required
              /><br>
           <button   id="sub"  onclick=" return validation();">Submit</button>
        
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
            margin-left: 20px;
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
            margin-left: 100px;
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
