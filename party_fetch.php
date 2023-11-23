

<?php
  include "document.php";
  include "dashboard.php";
  include "fetching.php";

   if($_POST)
  {
     $party_name = $_POST['party_name'];

     $sql="insert into parties (party_name)values('$party_name')";
     if (mysqli_query($conn,$sql))
     {
       header('Location: http://localhost/web/party_fetch.php');
       }

  }
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="r.css">
    <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>
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
     
  </head>
  <body>
    <form  name="meroform" id="myform" method="POST" action="party_fetch.php">
      <fieldset style="width:100px; height: 240px; background-color: beige;">
         <h1>party form</h1>
            <p>Party_Name:</p>
           <input type="text" name="party_name"><br>
           <button   id="sub" onclick="return validation();" >Submit</button>
        
      </fieldset>
     
    </form>
    <!-- <a href="student_form.html" class="move-right"><h3>Add new student</h3></a> -->
    <table >
        <tr>
            <th>S.N.</th>
            <th>Party_Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($parties as $index =>$party){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$party['party_name']?></td>
             <td>
                <a href="http://localhost/web/party_update.php?party_id=<?=$party['party_id']?>"><i class="fas fa-upload"></i></a>
              </td>
              <td>
                <a href="http://localhost/web/party_delete.php?party_id=<?=$party['party_id']?>"><i class="fas fa-envelope-open-text"></i></a>
            </td>
           
        </tr>
        <?php } ?>
    </table>
  </body>

  <style>
    #myform
    {
     margin-left: 600px;
     margin-top: 40px;
     

    
     
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
      width: 260px;
      height: 40px;
      margin-top : -140px;
      margin-left:  20px;
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
   
    } #sub:hover { background-color: #ffc400ec; } 
    table 
      { 
        margin-top: 60px;
       }
       table  a
       {
        color: black;
       }

    
    
  </style>

</html>
