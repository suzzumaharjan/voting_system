<?php
	session_start();

	if(isset($_SESSION['citizen'])){
		header('location:http://localhost/web/home.php');
	}


?>


<!DOCTYPE html>
<html>
	<head>
		<title>login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- 
		<script type="text/javascript">
			function validation()
			{
				var dt_citizen=$("#citizen_number").val();
				var dt_password=$("#password").val();
				var user_citizen=document.getElementById('citizen').value;
				var user_password=document.getElementById('pass').value;
				if(dt_citizen==user_citizen && dt_password== user_password)
				{
					alert("Thank you for log in");
					location.href='http://localhost/web/home.php';
				}
				else
				{
					alert("your account has not been register.So please rergister your account!!");
					location.href='http://localhost/web/login.php';

				}

			}
			
		</script>  <script type="text/javascript">
                                        function preventBack() { window.history.forward(); }
                                    setTimeout("preventBack()", 0);
                                    window.onunload = function () { null };
                                   </script>  -->
		<style type="text/css">
		
     
		
			body{
				padding: 0px;
				margin: 0px;
				background-image: url("vote.jpg") ;
				width: 30%;
				height: 100vh;
				background-size: 100%;
			}
			.box
			{
				width: 360px;
				padding: 30px;
				position: absolute;
				top: 50%;
				left:50%;
				text-align: center;
				background-color: black;
				box-shadow: 0px 0px 10px 0px #000;
				border-radius: 44px;
				transform: translate(-50%,-50%);

			}
			.box h1
			{
				color: white;
				text-transform: uppercase;
				font-weight: 100%;
				font-size: 40px;

			}
			.box input[type="text"],.box input[type="password"]
			{
				display: block;
				margin:20px auto;
				text-align: center;
				border: 3px solid #0367fd;
				padding: 14px 20px;
				width: 250px;
				color: white;
				background-color: black;
				border-radius: 44px;
				transition: 0.25px;
				outline: none;
				font-size: 20px;

			}
			.box input[type="text"]:hover,.box input[type="password"]:hover
			{
				width: 270px;
				border-color: #ffc400ec; 
			}
			.box input[type="submit"]
			{
				display: block;
				margin:20px auto;
				text-align: center;
				border: 3px solid #ffc400ec ;
				padding: 14px 24px;
				
				color: black;
				border-radius: 24px;
				transition: 0.25px;
				outline: none;
				cursor: pointer;
				font-size: 23px;
			}
			.box input[type="submit"]:hover
			{
				background-color: #ffc400ec;
			}
			.box a
			{
				display: block;
				margin:20px auto;
				text-align: center;
				border: 3px solid #0367fd ;
				padding: 14px 14px;
				width: 160px;
				color: white;
				border-radius: 24px;
				transition: 0.25px;
				outline: none;
				cursor: pointer;
				font-size: 26px;
				text-decoration:none;
				font-weight: 100%;
			}
			.box a:hover
			{
				background-color:#0367fd;
			}
			@media only screen and (max-width: 678px)
			{
				html
				{
					font-size: 45%;
				}
				body 
				{
	                background-size: 220%;
            	}
            	.box
            	{
            		width: 290px;
            	}
			}
	 		
		</style>

	</head>
	<body>
		<form class="box" method="post" action="http://localhost/web/search.php" >
			<div></div>
			<h1>log in</h1>
			
			<input type="text" placeholder="citizenship_number" name="citizen_number">
			<input type="password" placeholder="password" name="password">
			<input type="submit" value="Log In">
			<hr color="#2f3542" style="height: 0.5%;"/>
			<a href="registration.php"> Registation</a>
				
		</form>
		<!-- <div id="main">
		
		
			<form method="post" action="http://localhost/web/search.php">
			<fieldset style="width: 480px; height:350px;  background-image: url(page.png); box-shadow: 10px 10px grey; border-radius: 60px;  " >
				
					<table align="center">
						<tr>
							<td style="text-align: center; font-size: 40px;"><b>Log In</b></td>
						</tr>
							<tr>
								<td><input type="text"  id="citizen" placeholder="citizenship_number" name="citizen_number" /><br/>
									<input type="password"  id="pass" placeholder="Password" name="password"/><br/>
									<input type="submit" value="Log In" id="sub"/><br/>
								</td>
							</tr>

					</table>
					<hr color="#2f3542" style="height: 0.5%;"/>
					<p><a href="registration.php"> Registation</a></p>

				</fieldset>
				</form>
		
			
		</div>	-->	
	</body>
</html>