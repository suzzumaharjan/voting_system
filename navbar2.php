<?php
session_start();
	include 'document.php';
	if(!isset($_SESSION['citizen']))
{
	header('location:http://localhost/web/login.php');
}  
	$id = $_SESSION['citizen'];

	$sql = "Select * from tb_users where citizen_number='$id'";
	$result = mysqli_query($conn, $sql);
  	$row = mysqli_fetch_assoc($result);
  	if (mysqli_num_rows($result) > 0) {
        $tb_user = array(
           "id" => $row['id'],
          "first_name" => $row['first_name'],
           "address" => $row['address'],
          "phone" => $row['phone'],
          "date_of_birth"=>$row['date_of_birth'],
          "citizen_number"=>$row['citizen_number'],
          "password" => $row['password'],
          'voter_id' => $row['voter_id'],
          'status' => $row['status']
    
        );
       $_SESSION['status'] = $tb_user['status'];
  	} 
?>
<!DOCTYPE html>
<html>
		<head>
			<style type="text/css">
				*
			{
				box-sizing: border-box;
			}
			body
			{
				margin:0;
				padding: 0;
				/*background-color: #FFDEE9;
				background-color: #8EC5FC;
				background-color: #8EC5FC;*/
				background: linear-gradient(to right, white ,white, #E0C3FC);
				 /*background: linear-gradient(to left, #cc99ff 0%, #ffffff 100%);*/
				/*background-image: linear-gradient(62deg, white 55%,#8EC5FC 0%, #E0C3FC 20% );*/

			}
			.navbar
			{
				display: flex;
				justify-content: space-between;
				align-items: center;
				font-family: sans-serif;
				background-color: white;
				box-shadow: 10px 10px 5px grey;

				
				

			}
			.brand-title
			{
				font-size: 50px;
				margin: 20px;
				font-family: sans-serif;
				font-weight: bold;
			}
			.navbar-links ul
			{
				margin: 0;
				padding: 0;
				display: flex;
				margin-right: 5px;
				

			}
			.navbar-links li 
			{
				list-style: none;
				
			}
			.navbar-links li a
			{
				text-decoration: none;
				color: black;
				padding: 12px 12px;
				margin: 10px;
				text-align: center;
				display: block;
				font-size: 23px;
				font-weight: bold;
				font-family: sans-serif;
				/*border:1px solid black;*/
				/*padding-top: 20px;*/
				margin: 0 auto;

			}
			.navbar-links li:hover
			{
				background-color: grey;
			}
			.dropdown {
				  float: left;
				  overflow: hidden;
				}

.dropdown .dropbtn {
  font-size: 23px;    
  border: none;
  outline: none;
  color: black;
  padding: 12px 12px;
  background-color: inherit;
  font-family: inherit;
  margin: 10px;font-weight: bold;
  text-align: center;
 /* border:1px solid black;*/
  margin: 0 auto;
}


.dropdown .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  padding: 4px 7px; 
  margin-right: 30px;
  
  font-size: 20px; 
  
  font-family: sans-serif;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  font-family: sans-serif;

}

.dropdown .dropdown-content a {
  float: none;
  color: black;
   padding: 7px 20px; 
  text-decoration: none;
  text-align: left;
  display: block;
   min-width: 60px;
  color: white

 
  margin-top: 10px;
  
}
.dropdown-content .dropdown-contents {
  float: none;
  color: black;


  padding: 1px 6px;
  text-decoration: none;
  display: block;
   min-width: 200px;
   font-size: 16px;
    text-align: left;
  
  margin-top: 10px;
  font-family: sans-serif;
}

.dropdown:hover  {
  background-color: #555;
  color: white;
  cursor: pointer;
  background-color: grey;
}
.dropdown:hover .dropbtn
{
	cursor: pointer;
	background-color: grey;
	

}
.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
  
}
.dropdown-content :hover {
  background-color: #ddd;
   display: block;
  color: black;
}

.dropdown:hover .dropdown-content
 {
 	 display: block;
}





@media   (max-width: 704px)
{
	.navbar
	{
		width: 100%;
		flex-direction: column;
		align-items: flex-start;
		margin: 0 ;
		padding: 0;

	}

	.navbar .brand-title
			{
				
				font-size: 25px;
				font-family: sans-serif;
				font-weight: bold;
			}
			.navbar .navbar-links
			{
				width: 100%;
				justify-content: space-between;


			}
			
	.navbar .navbar-links ul
			{
				
				margin: 0 auto;
				justify-content: space-between;
				
				font-family: sans-serif;
				/*flex-direction: column;*/
				/*padding: 10px 10px;*/


			}
			.navbar .navbar-links li a
			{
				border:none;
				margin: 0 auto;
				padding: 1px 1px;
				font-size: 15px;
				border: none;
				text-decoration: underline;
				/*background-color: black;*/
			}
			
			
			
			.navbar .dropdown .dropbtn
			{
				text-align: center;
				margin: 0 auto;
				font-size: 15px;
				text-decoration: underline;
				
				padding: 1px 1px;
				/*background-color: black;*/
			}
			.navbar .dropdown .dropdown-content 
				{
					min-width: 8%;
					text-align: left;
					
					

				}


			 .dropdown .dropdown-content a
			{
				
				width: 100%;
				font-size: 13px;
				font-family: sans-serif;
				font-weight: bold;
				
				text-align: left;
				text-decoration: none;
			}
			
			.dropdown-content
			{
				
				font-size: 14px;
				font-family: sans-serif;
				font-weight: bold;
				color: black;
				padding: 1px 1px;
				margin-top: 0px;
			}
	.dropdown:hover  {
			  background-color: #555;
			  color: white;
			  cursor: pointer;
			  background-color: grey;
			}
			.dropdown:hover .dropbtn
			{
				cursor: pointer;
				background-color: grey;
				

			}
			/*.dropdown-content a:hover {
			  background-color: #ddd;
			  color: black;
			}*/

			.dropdown:hover .dropdown-content {
			  display: block;
			}
			

}


			</style>
		</head>
		<body>
			<nav class="navbar">
			<div class="brand-title">Hamro Vote</div> 
			<div class="navbar-links">
				<ul>
					<li><a href="home.php">Home</a></li>
					
					
							<div class="dropdown">
								<button class="dropbtn">Provision <i class="fas fa-caret-down"></i>
								</button>
								<div class="dropdown-content">
									<a href="user_ballot.php?provision=1">Provision 1</a>
									<a href="user_ballot.php?provision=2">Provision 2</a>
									<a href="user_ballot.php?provision=3">Provision 3</a>
									<a href="user_ballot.php?provision=4">Provision 4</a>
								</div>
							</div>
							<div class="dropdown">
								<button class ="dropbtn">Profile</button>
								<div class="dropdown-content">
									<div class="dropdown-contents">
										Name: <?=$tb_user['first_name']?><br/><br/>
										Address: <?=$tb_user['address']?><br/><br/>
										Phone: <?=$tb_user['phone']?><br/><br/>
										Citizen_number: <?=$tb_user['citizen_number']?><br/><br/>
										Voter_id: <?=$tb_user['voter_id']?><br/><br/>
										Date_of_birth: <?=$tb_user['date_of_birth']?><br/><br/>
										Status :
													<?php 
											                if($tb_user['status'] == 0){
											                  echo "not voted";
											                }else{
											                  echo "voted";
											                }
				              							?>
			              								
									</div>
								</div>
							</div>
					
					<li><a href="home.php#about">About Us</a></li>
					<li><a href="home.php#contact">Contact</a></li>
					
						
					
						<div class="dropdown">
							<button class="dropbtn">Result <i class="fas fa-caret-down"></i>
							</button>
							<div class="dropdown-content">
								<a href="result1.php?provision=1">Provision1</a>
								<a href="result1.php?provision=2">Provision 2</a>
								<a href="result1.php?provision=3">Provision 3</a>
								<a href="result1.php?provision=4">Provision 4</a>
							</div>
						</div>
					
					<li><a href="logout.php">Log out</a></li>
				</ul>
			</div>
		</nav>
		 

		</body>
</html>
