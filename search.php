<?php
include 'document.php';
if($_POST)
{
    $citizen_number = $_POST['citizen_number'];
    $password = $_POST['password'];
    $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = '1234567891011121';
        $encryption_key = "a44afb0b6808d662";

        $encryptedpswd = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);

 }
 if(empty($citizen_number) && empty($password))
 {
       header('location:http://localhost/web/login.php');

 }
 else
 {
      if(is_numeric($citizen_number))
        {
           $sql =("SELECT * FROM tb_users where citizen_number='$citizen_number' and password='$encryptedpswd'")  or die("failed to query database".mysqli_error());
           
           $result=mysqli_query($conn,$sql);
           
           $row=mysqli_fetch_array($result);
          if($row['citizen_number']==$citizen_number && $row['password']==$encryptedpswd)
           {
            //echo"<script>alert('Log In seccessfully!!!' );</script>";
            session_start();
            $_SESSION['citizen'] = $citizen_number;
            
            header('location:http://localhost/web/home.php');
            exit();
            // echo "<script>location.href='http://localhost/web/home.php';</script>";

           }
           else
           {
            
            echo "<script> alert('failed to login'); </script>";
            header('location:http://localhost/web/login.php');
            exit();
           }

        }
        else
        {

           $sql2 ="SELECT * FROM admins where full_name='$citizen_number' and password='$encryptedpswd'";
            //echo $sql2;
           $result2=mysqli_query($conn,$sql2);
          
            $row2=mysqli_fetch_array($result2);
            
            $admin  = Array('name' => $row2['full_name'],'password' => $row2['password']);
           // print_r($admin);
            if($admin['name'] == $citizen_number && $admin['password']  == $encryptedpswd){  
              session_start();
              $_SESSION['admin']=$citizen_number;
            
              header('location:http://localhost/web/admin_main.php');
              exit();
              // echo "<script>location.href='http://localhost/web/dashboard.php';</script>";

            }
            else
               {
                echo "<script> alert('failed to login'); </script>";
                header('location:http://localhost/web/login.php');
                exit();
               }

          }
 
 }

   


   
?>