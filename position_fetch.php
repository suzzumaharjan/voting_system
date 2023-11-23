<?php
  include "document.php";
  include "dashboard.php";
  include "fetching.php";

  if($_POST)
  {
     $position_name = $_POST['position_name'];

     $sql="insert into positions (position_name)values('$position_name')";
     if(mysqli_query($conn,$sql))
     {
      header('Location: http://localhost/web/position_fetch.php');
     }

  }
  
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>
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
    <link rel="stylesheet" type="text/css" href="r.css">
  </head>
  <body>
    <form  name="meroform" id="myform" method="POST" action="position_fetch.php">
      <fieldset style="width:180px; height: 220px; background-color: beige;">
         <h1>Position Form</h1>
            <p>Position Name:</p>
           <input type="text"  name="position_name"><br>
           <button   id="sub"  onclick=" return validation();">Submit</button>
        
      </fieldset>
     
    </form>
    <!-- <a href="student_form.html" class="move-right"><h3>Add new student</h3></a> -->
    <table >
        <tr>
            <th>S.N.</th>
            <th>Position_Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($positions as $index =>$position){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$position['position_name']?></td>
            <td>
                <a href="http://localhost/web/position_update.php?position_id=<?=$position['position_id']?>"><i class="fas fa-upload"></i></a>
            </td>
            <td>
                <a href="http://localhost/web/position_delete.php?position_id=<?=$position['position_id']?>"><i class="fas fa-envelope-open-text"></i></a>
            </td>
           
        </tr>
        <?php } ?>
    </table>
  </body>

  <style>
    #myform
    {
     margin-left: 500px;
     margin-top: 60px;
     

    
     
    }
    #myform h1
    {
      text-align: center;
      font-weight: bold;
      font-family: sans-serif;
      margin-top: -4px;
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
      height: 40px;
      font-weight: bold;
      font-size: 24px;
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
      margin-top: 40px;
      margin-left: 290px;
    }
    table a
    {
      color: black;
    }
    
    
  </style>

</html>
