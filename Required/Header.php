<?php 
	
	# START USER SESSION
	SESSION_START();
	
	# CHECK USER IS CURRENTLY LOGGED IN
	function UserLoggedIn()
	{
		// CHECK SESSION - TRUE
		if (isset($_SESSION['User'])) { return true; }
		
		// CHECK COOKIE - TRUE
		if (isset($_COOKIE['User'])) { return true; }
		
		// DEFAULT RETURN - FALSE
		return false;
	}
	
	# MANUAL SET OF BASEPATH
	$LINK_BASEPATH = 'https://development.edwardgough.co.uk/Layout/';
	
	
	# BUILD HTML DISPLAY ARRAY
	$ARR_Display = [
		'Navigation' => [
			'Right' => '',
			'Left' => '',
		]
	];
	
	# DEFAULT ITEMS
	$ARR_OnScreenDisplay['Navigation']['Left'] .= '<a href="' . $LINK_BASEPATH . '">Home</a>';
	$ARR_OnScreenDisplay['Navigation']['Left'] .= '<a href="' . $LINK_BASEPATH . '">Contact</a>';
	$ARR_OnScreenDisplay['Navigation']['Left'] .= '<a href="' . $LINK_BASEPATH . '">Something</a>';
	
	
	
	# USER IS LOGGED IN
	if (UserLoggedIn())
	{
		# ITEMS ONLY FOR LOGGED IN USERS
		$ARR_OnScreenDisplay['Navigation']['Right'] = '<a class="SocialLink" data-action="Logout">' . $_SESSION['User']['Username'] . '</a>';
	}
	
	
	# USER IS NOT LOGGED IN
	if (!UserLoggedIn())
	{
		# ITEMS ONLY FOR LOGGED OUT USERS
		$ARR_OnScreenDisplay['Navigation']['Right'] = '<a href="' . $LINK_BASEPATH . '/Login.php" class="SocialLink">Login</a>';
	}
	
?>



<!DOCTYPE html>
<html lang="en">

	<head>
		
		<title>Development Area</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- IMPORT LOCAL STYLE SHEETS -->
		<link rel="stylesheet" href="Style/Main.css">
		
	</head>
	
	<body>
	
		<section>
		
			<h1 class="WebsiteName">Development Area</h1>
			
			<nav>
				
				<?php echo $ARR_OnScreenDisplay['Navigation']['Left']; ?>
				<?php echo $ARR_OnScreenDisplay['Navigation']['Right']; ?>
			</nav>
			
		</section>
		
		<main>