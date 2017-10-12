<!--<?php
	echo "hello world";
?>-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Book Club</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
	</head>

	<body>
		<div id="pagecontainer">

			<?php include("header.php"); ?>

			<main>
				
				<div id="text">

					<h1>Contact us</h1>
					<form>
						Name:<br>
						<input type="text" name=""><br>
						E-mail:<br>
						<input type="email" name=""><br>
						Your message:<br>
						<input type="text" name="">
						<input type="submit" name="" value="Submit">
					</form>
					
				</div>

			</main>

		<?php include("footer.php"); ?>

		</div>
	</body>
</html>
