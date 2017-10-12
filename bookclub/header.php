<!DOCTYPE html>
<html>
<?php include 'config.php'; ?>
<header>
	<div id="logo-img">
		<a href="index.php">
			<img src="img/logo.png">
		</a>
	</div>
				<nav>
		    		<ul id="nav">
		   				<li>
		   					<a class="<?php echo ($current_page == 'index.php' ||$current_page=="") ? 'active' : NULL ?>"
		   						href="index.php">HOME</a>
		   				</li>
		 				<li>
		 					<a class="<?php echo $current_page == 'about.php' ? 'active' : NULL ?>"
		   					href="about.php">ABOUT</a>
		 				</li>
						<li>
							<a class="<?php echo $current_page == 'browse.php' ? 'active' : NULL ?>"
		   					href="browse.php">BROWSE BOOKS</a>
						</li>
						<li>
							<a class="<?php echo $current_page == 'books.php' ? 'active' : NULL ?>"
		   					href="books.php">MY BOOKS</a>
						</li>
						<li>
							<a class="<?php echo $current_page == 'gallery.php' ? 'active' : NULL ?>"
		   					href="gallery.php">GALLERY</a>
						</li>
						<li>
							<a class="<?php echo $current_page == 'contact.php' ? 'active' : NULL ?>"
		   					href="contact.php">CONTACT</a>
						</li>	    		
					</ul>
		    	</nav>
			</header>

</html>