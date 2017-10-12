<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Book Club</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
        <link rel="stylesheet" href="css/blueimp-gallery.min.css">
	</head>

	<body>
		<div id="pagecontainer">

			<?php include("header.php"); ?>


            <h1>Gallery</h1>
            <!-- The Gallery is copied from https://github.com/blueimp/Gallery by Blueimp -->
            <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
            </div>


        <div id="links">

        <!-- This php-part is copied from https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them  --> 
            <?php
            $files = glob("uploadedfiles/*.*");
            for ($i=0; $i<count($files); $i++)
            {
             $image = $files[$i];
            $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
                 );

                 $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                 if (in_array($ext, $supported_file)) {
                   // echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
                     echo '<a href="'.$image .'"><img src="'.$image .'" alt="Random image" class="img_size" /></a>'."<br /><br />";
                    } else {
                        continue;
                    }
                  }
               ?> <!-- Until here -->
        </div>
            
            <script>
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement,
                    link = target.src ? target.parentNode : target,
                    options = {index: link, event: event},
                    links = this.getElementsByTagName('a');
                    blueimp.Gallery(links, options);
            };
            </script>


		<?php include("footer.php"); ?>

		</div>
        <script src="js/blueimp-gallery.min.js"></script>
	</body>
</html>
