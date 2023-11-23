
<?php
  include "document.php";
  include "dashboard.php";

  $sql = "SELECT * FROM tb_users";
  
  //Fetching result from database
  $result = mysqli_query($conn, $sql);
  
  //Checking if there is data saved in the students table.
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $i = 0;
      // Looping through the results
      while($row = mysqli_fetch_assoc($result)) {
        $tb_users[$i] = array(
          "id" => $row['id'],
          "first_name" => $row['first_name'],
           "address" => $row['address'],
          "phone" => $row['phone'],
          "date_of_birth"=>$row['date_of_birth'],
          "citizen_number"=>$row['citizen_number'],
          "password" => $row['password'],
          "voter_id"=>$row['voter_id'],
          "status"=>$row['status'],
        );
        $i++;
      }
  } 

  //connection close
  mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
   <link rel="stylesheet" type="text/css" href="r.css">
   <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>
  </head>
    <style type="text/css">
      table
      {
        margin-left: 290px;
        margin-top: 90px;
      }
      table a
      {
        color: black;
      }
     
    </style>
  <body>
    <!-- <form method="POST" action="http://localhost/web-technologies/crud/search_student.php">
      <input type="text" placeholder="Enter name of student to search" name="searched_field" required/> 
      &nbsp; <input type="submit" value="Search Student" /> 
    </form> -->
    <!-- <a href="student_form.html" class="move-right"><h3>Add new student</h3></a> -->
    <table >
        <tr>
            <th>S.N.</th>
            <th>Full_Name</th>
            <th>Address</th>
             <th>Phone</th>
            <th>Date_of_Birth</th>
            <th>Citizen Number</th>
            <th>Password</th>
            <th>Voter_id</th>
            <th>voted</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($tb_users as $index =>$tb_user){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$tb_user['first_name']?></td>
            <td><?=$tb_user['address']?></td>
            <td><?=$tb_user['phone']?></td>
            <td><?=$tb_user['date_of_birth']?></td>
            <td><?=$tb_user['citizen_number']?></td>
            <td><?=$tb_user['password']?></td>
            <td><?=$tb_user['voter_id']?></td>
            <td>
              <?php 
                if($tb_user['status'] == 0){
                  echo "not voted";
                }else{
                  echo "voted";
                }
              ?>
            </td>
            <td>
                <a href="http://localhost/web/user_update.php?id=<?=$tb_user['id']?>"><i class="fas fa-upload"></i></a>

            </td>
            <td>
                <a href="http://localhost/web/user_delete.php?id=<?=$tb_user['id']?>"><i class="fas fa-envelope-open-text"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
  </body>
</html>
