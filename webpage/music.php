
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>
		  
		<div id="listarea">
			<ul id="musiclist">
				<?php 
				chdir("songs/");
				if (!isset($_REQUEST["playlist"])) {
					foreach (glob("*.mp3") as $filename) {
						$file_size = filesize($filename);
						if ($file_size < 1023) {
							$file_size + 'b';
						}
         			echo "<li class=\"mp3item\">
        			<a href=\"songs/" .$filename. "\">" .$filename. "</a>
        			(" . filesize($filename) .")
       				</li>";
    			 }
    			 	foreach (glob("*.txt") as $filename) {
         			echo "<li class=\"playlistitem\">
        			<a href=\"songs/" .$filename. "\">" .$filename. "</a>
        			(" . filesize($filename) .")
       				</li>";
    			 }
					
				}else {
					$file_lines = file($_REQUEST["playlist"]);

					foreach (glob("*.mp3") as $filename) {
						if (in_array($filename, $file_lines)) {
							echo "<li class=\"mp3item\">
        					<a href=\"songs/" .$filename. "\">" .$filename. "</a>
        					(" . filesize($filename) .")
       						</li>";
						}
					}
				}
     			
				 ?>

			
			</ul>
		</div>
	</body>
</html>
