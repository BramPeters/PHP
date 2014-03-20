<?php
session_start();
?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/style.css" />
    </head>
<body>

<div class='sectionContainer'>
	<div class='sectionHeader'>Home</div>
	<?php 
		// this will make 'home', 'view products' and 'view cart' appear
		include 'Navigation.php' 
	?>
	
	<div class='sectionContents'>
		Welcome to shopping website!
	</div>
</div>

</body>
</html>