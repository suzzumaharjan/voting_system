<?php
session_start();
if(!isset( $_SESSION['admin']))
{
	header('location:http://localhost/web/login.php');
}
  ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style type="text/css">
		body
		{
			background: linear-gradient(to right, #dcdde1 ,white,#aaa69d );
		}
			*
			{
				box-sizing: border-box;
				list-style: none;
				text-decoration: none;

			}
			.main
			{
				display: flex;
				position: relative;

			}
			.main .sidebar
			{
				position: fixed;
				width: 250px;
				height: 1000%;
				background-color:black;
				padding: 30px;
				left: -20px;
				top: -20px;

			}
			.main .sidebar h2
			{
				color: white;
				text-transform: uppercase;text-align: center;
				margin-bottom: 25px;
				font-size: 27px;
				border-bottom: 5px solid white;
			}
			li
			{
				padding: 20px;
				font-size: 20px;
				border-radius: 50px 20px;
				border:1px solid white;
				margin-bottom: 25px;
			}
			li:hover{
				background-color: #786fa6;
			}
			a
			{
				display: block;
				color: #bdb8d7;
			}
		</style>
	</head>
	<body>
		<div class="main">
			<div class="sidebar">
			<h2>Hamro vote</h2>
			<li><a href="http://localhost/web/admin_main.php">Home</a></li>
			<li><a href="http://localhost/web/fetch.php">Register user </a></li>
			<li><a href="http://localhost/web/admin.php">Admin</a></li>
			<li><a href="http://localhost/web/party_fetch.php">Parties</a></li>
			<li><a href="http://localhost/web/position_fetch.php">Positions</a></li>
			<li><a href="http://localhost/web/ballot_fetch.php">Ballot</a></li>
			<li><a href="logout.php">Logout</a></li>
		</div>
			
		</div>
		

	</body>
</html>