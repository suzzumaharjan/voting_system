<?php
    //including the configuration file.
    include 'document.php';
   

    // //If something has been posted from the form
    if($_POST){
        
       $first_name = $_POST['first_name'];
        $address = $_POST['address'];
         $phone = $_POST['phone'];
        $date_of_birth = $_POST['date_of_birth'];
        $citizen_number = $_POST['citizen_number'];
        $password =$_POST['password'];
        
        $id = $_POST['id'];
        $sql = "UPDATE tb_users SET first_name = '$first_name',
         address='$address',phone='$phone',date_of_birth='$date_of_birth',citizen_number='$citizen_number',password='$password' WHERE id = $id";
        if(mysqli_query($conn, $sql)){
            echo "Record updated successfully.";
            header('Location: http://localhost/web/fetch.php');
            mysqli_close($conn);
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if($_GET){
        $id = $_GET['id'];
        $sql = "SELECT * FROM tb_users WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $tb_user = array(
                    "id" => $row['id'],
                    "first_name" => $row['first_name'],
                    "address" => $row['address'],
                    "phone" => $row['phone'],
                    "date_of_birth"=>$row['date_of_birth'],
                    "citizen_number"=>$row['citizen_number'],
                    "password" => $row['password'],
                    
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
            var first_name=document.forms['meroform']['first_name'];
            var address=document.forms['meroform']['address'];
            var phone=document.forms['meroform']['phone'];
            var date_of_birth=document.forms['meroform']['date_of_birth'];
            var citizen_no=document.forms['meroform']['citizen_number'];
            var password=document.forms['meroform']['password'];
            if(first_name.value=="")
            {
              alert('enter the full name');
              return false;
            }
            else if(address.value=="")
            {
               alert('enter the address name');
              return false;
            }
             else if(is_numeric(phone.value))
            {
               alert('enter the validate phone');
              return false;
            }
            else if(phone.value.length!<=10)
            {
              alert('enter the validate number');
              return false;
            }
            else if(phone.value=="")
            {
               alert('enter the  phone');
              return false;
            }
             else if(date_of_birth.value=="")
            {
               alert('enter the date_of_birth');
              return false;
            }
            else if(citizen_number.value=="")
            {
               alert('enter the citizen_number');
              return false;
            }
            else if(password.value=="")
            {
               alert('enter the password');
              return false;
            }
            else
            {
              return true;
            }
         }
       </script>
    <form name="meroform" id="myform" method="POST" >
      <fieldset style="width:400px; height: 680px; background-color: beige;">
         <h1>User Form</h1>
            <h2>First Name:</h2>
           <input type="hidden" name="id" value="<?=$tb_user['id']?>" />
              <input
                type="text"
                name="first_name"
                id="first_name"
                value = "<?=$tb_user['first_name']?>"
                required
              /><br>
              <h2>Address:</h2>
             <input
                type="text"
                name="address"
                id="address"
                value = "<?=$tb_user['address']?>"
                required
              /><br>
               <h2>Phone No:</h2>
             <input
                type="number"
                name="phone"
                id="phone"
                value = "<?=$tb_user['phone']?>"
                required
              /><br>
               <h2>Date_of_birth:</h2>
             <input
                type="date"
                name="date_of_birth"
                id="date_of_birth"
                value = "<?=$tb_user['date_of_birth']?>"
                required
              /><br>
              
               <h2>Citizen Number:</h2>
             <input
                type="text"
                name="citizen_number"
                id="citizen_number"
                value = "<?=$tb_user['citizen_number']?>"
                required
              /><br>
               <h2>Password:</h2>
             <input
                type="password"
                name="password"
                id="password"
                value = "<?=$tb_user['password']?>"
                required
              /><br>
          
           <button   id="sub"  onclick="return validation();">Submit</button>
        
      </fieldset>
     </form> 
  </body>

  <style>
    #myform
    {
     margin-left:450px;
     margin-top: 60px;
     

    
     
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
