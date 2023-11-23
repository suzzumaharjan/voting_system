<?php
    include 'document.php';
    
    if($_POST)
    {
        $first_name = $_POST['first_name'];
         $address = $_POST['address'];
         $phone = $_POST['phone'];
        $date_of_birth = $_POST['date_of_birth'];
        $citizen_number = $_POST['citizen_number'];
        $password =$_POST['password'];

        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = '1234567891011121';
        $encryption_key = "a44afb0b6808d662";

        $encryptedpswd = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);


        $count=0;
        if (empty($first_name)) {
        echo"<script>alert('You forgot to enter your first name!'); window.history.back(); first_name.focus();</script>";
        
        $count++;
        }
        
    

        
        else if (empty($phone)) {
        echo"<script>alert('You forgot to enter your phone!');window.history.back();phone.focus();</script>";
        $count++;
        
        }
         else if(strlen($phone)!=10)
        {
             echo"<script>alert('enter a validate phone number!');
            location.href='http://localhost/web/registration.php';
             phone.focus();
            </script>";
        $count++;

        }

        else if (empty($date_of_birth)) {
        echo"<script>alert('You forgot to enter your date_of_birth!');window.history.back();
        date_of_birth.focus();</script>";
        
        $count++;
        }
        

        else if (empty($citizen_number)) {
        echo"<script>alert('You forgot to enter your citizen_number!');
            location.href='http://localhost/web/registration.php';
             citizen_number.focus();
            </script>";

        
        $count++;
        }
        else if(strlen($citizen_number)!=11)
        {
             echo"<script>alert('citizen number must be of 11 digit!');
            location.href='http://localhost/web/registration.php';
            citizen_number.focus();
            </script>";
        $count++;

        }

        else if (empty($password)) {
       echo"<script>alert('You forgot to enter your password!');window.history.back();
       password.focus();</script>";
        
                $count++;
        }
         else if(strlen($password)!=6)
        {
             echo"<script>alert('enter a validate password!');
            location.href='http://localhost/web/registration.php';
             password.focus();
            </script>";
        $count++;

        }
        if($count==0)        
            {
                
                    $sql =("SELECT * FROM tb_users where citizen_number='$citizen_number' ")  or die("failed to query database".mysqli_error());
                       
                       $result=mysqli_query($conn,$sql);
                       
                       $row=mysqli_fetch_array($result);
                      if($row['citizen_number']==$citizen_number)
                       {
                       echo"<script>alert('Account has been already Registered!!!' );</script>";
                        header('location:http://localhost/web/registration.php');


                       }
                       else
                       {
                                     $voter_id = rand(100000,999999);
                                    while(checker($voter_id) != true){
                                        $voter_id = rand(100000,999999);
                                    }
                               
                               

                            $sql = "INSERT into tb_users (first_name, address,phone,date_of_birth,citizen_number,password,voter_id) VALUES ('$first_name','$address','$phone','$date_of_birth','$citizen_number','$encryptedpswd','$voter_id')";
                            if(mysqli_query($conn, $sql))
                            {
                             echo"<script>alert('Your account has been created !!!! Now please log In');</script>";
                             header('location:http://localhost/web/login.php');
                             
                             
                             // $enc=base64_encode($password);
                             // base64_decode($enc);
                            //header("Location:login.php");
                            } 
                            else
                             {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            header("Location:http://localhost/web/registration.php");
                            }
                        }
                
               }
             

        }
         function checker($voterId)
                                     {
                                         $sql1="select voter_id from tb_users where voter_id=$voterId";
                                            $result1=mysqli_query($conn,$sql1);
                                            $row1=mysqli_fetch_array($result1);
                                        
                                             if($row1['voter_id']==$voterId)
                                             {
                                                 return false;
                                            }
                                             else
                                                {
                                                    return true;
                                                }
                                

                                     }
    mysqli_close($conn);
?>