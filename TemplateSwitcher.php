
<?php
	
	// GET TEMPLATE PARAMETER ?Template
	$Template_Name = $_GET["Template"];
	
	// REQUIRE HEADER FILE
	require_once 'Required/Header.php';
	
	// REQURIE TEMPLATE LOAD FILE
	require_once 'Template/' . $Template_Name . '.php';
	
	// REQUIRE FOOTER FILE
	require_once 'Required/Footer.php';
	

?>