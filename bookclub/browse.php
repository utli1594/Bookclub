
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
					<h3>Search</h3>
            		<hr>
           			 <form action="browse.php" method="POST">
               		 <table bgcolor="#bcdbdb" cellpadding="6">
                   	 <tbody>
                        <tr>
                            <td>Title:</td>
                            <td><INPUT type="text" name="searchtitle"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><INPUT type="submit" name="submit" value="Submit" class="searchbutton"></td>
                        </tr>
                                             <tr>
                            <td>Author:</td>
                            <td><INPUT type="text" name="searchauthor"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><INPUT type="submit" name="submit" value="Submit" class="searchbutton"></td>
                        </tr>
                   	 </tbody>
                	</table>
            		</form>

            		

            		<h3>Book List</h3>
						<hr>
						<?php
						# This is the mysqli version

						$searchtitle = "";
						$searchauthor = "";

						if (isset($_POST) && !empty($_POST)) {
						# Get data from form
						    $searchtitle = trim($_POST['searchtitle']);
						    $searchauthor = trim($_POST['searchauthor']);
						}

						//	if (!$searchtitle && !$searchauthor) {
						//	  echo "You must specify either a title or an author";
						//	  exit();
						//	}

						$searchtitle = addslashes($searchtitle);
						$searchauthor = addslashes($searchauthor);

						$searchtitle = htmlentities($searchtitle);
						$searchauthor = htmlentities($searchauthor);

						# Open the database
						@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

						if ($db->connect_error) {
						    echo "could not connect: " . $db->connect_error;
						    printf("<br><a href=index.php>Return to home page </a>");
						    exit();
						}

						# Build the query. Users are allowed to search on title, author, or both

						$query = " select isbn, title, author, reserved from Book";
						if ($searchtitle && !$searchauthor) { // Title search only
						    $query = $query . " where title like '%" . $searchtitle . "%'";
						}
						if (!$searchtitle && $searchauthor) { // Author search only
						    $query = $query . " where author like '%" . $searchauthor . "%'";
						}
						if ($searchtitle && $searchauthor) { // Title and Author search
						    $query = $query . " where title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
						}

						//echo "Running the query: $query <br/>"; # For debugging

						/*
						  # Here's the query using an associative array for the results
						  $result = $db->query($query);
						  echo "<p> $result->num_rows matching books found </p>";
						  echo "<table border=1>";
						  while($row = $result->fetch_assoc()) {
						  echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
						  }
						  echo "</table>";
						 */

						# Here's the query using bound result parameters
						// echo "we are now using bound result parameters <br/>";
						$stmt = $db->prepare($query);
						$stmt->bind_result($isbn, $title, $author, $reserved);
						$stmt->execute();

						echo '<table bgcolor="bcdbdb" cellpadding="6">';
						echo '<tr><b><td>ID</td><td>Title</td> <td>Author</td> <td>Reserved</td> <td>Reserve</td> </b> </tr>';
						while ($stmt->fetch()) {
							if($reserved == 0)
								$reserved='NO';
							else $reserved='YES';

						    echo "<tr>";
						    echo "<td> $isbn </td><td> $title </td><td> $author </td><td> $reserved </td>";
						    echo '<td><a href="reservedbooks.php?isbn=' .
						    urlencode($isbn) . '"> Reserve </a></td>';
						    echo "</tr>";
						}
						echo "</table>";


    
?>



					
				</div>

			</main>

		<?php include("footer.php"); ?>

		</div>
	</body>
</html>
