<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="style3.css">
	</head>
	</head>
	<body>

			<div class="regfrom">
			<h1>Registration Form</h1>
		</div>
		<div class="main">
		<form name="myform" id="myform" method="POST" action="http://localhost/web/insert.php">
			<div class="name1">
				<h2 class="name">Full Name</h2>
				<input type="text" name="first_name" class="firstname"><br>
				
				
			</div>
			<h2 class="name">Address</h2>
			<select name="address" class="address">
				<option value="bhojpuri">Bojpuri District (1)</option>

				<option value="dhankuta">Dhankuta District (1)</option>

				<option value="illam">Ilam District (1)</option>

				<option value="jhapa">	jhapa District (1)</option>

				<option value="khotang">Khotang District (1)</option>

				<option value="morang">Morang District (1)</option>


				<option value="parsa">Parsa District (2)</option>

				<option value="bara">Bara District (2)</option>

				<option value="rautahat">Rautahat District (2)</option>

				<option value="siraha">	Siraha District (2)</option>

				<option value="dhanusha">Dhanusha District (2)</option>

				<option value="saptari">Saptari District (2)</option>


				<option value="sindhuli">Sindhuli District (3)</option>

				<option value="bhaktapur">Bhaktapur District (3)</option>

				<option value="kathmandu">Kathmandu District (3)</option>

				<option value="lalitpur">Lalitpur District (3)</option>

				<option value="nuwakot">Nuwakot District (3)</option>

				<option value="rasuwa">Rasuwa District (3)</option>


				<option value="baglung">Baglung District (4)</option>

				<option value="gorkha">Gorkha District (4)</option>

				<option value="kaski">Kaski District (4)</option>

				<option value="lamjung">Lamjung District (4)</option>

				<option value="manang">ManangDistrict (4)</option>

				<option value="mustang">Mustang District (4)</option>


				<option value="kapilvastu">Kapilvastu District</option>

				<option value="parasi">Parasi District</option>

				<option value="rupandehi">Rupandehi District</option>

				<option value="arghakhanchi">Arghakhanchi District</option>

				<option value="gulmi">Gulmi District</option>

				<option value="palpa">Palpa District</option>
			</select>
			<h2 class="name">Phone no:</h2>
			<input type="number" name="phone" class="phone">

			<h2 class="name">Date of Birth</h2>
			<input type="date" name="date_of_birth" class="date_of_birth">

			<h2 class="name">Citizen number:</h2>
			<input type="number" name="citizen_number" class="Citizenship_no" placeholder="eg:23456789012">

			<h2 class="name">Password</h2>
			<input type="password" name="password" class="password">

			<button type="submit">Submit</button>

		</form>
		
	</div>

		
				
	</body>
</html>