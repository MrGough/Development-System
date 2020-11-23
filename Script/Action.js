
/* #####  ACTION JS FILE - 0.01  ##### */


// --------------- [ ACCOUNT ]


// USER ACCOUNT LOGIN FUNCTION
function Login(OBJ_ControllerData)
{
	// RUN BEFORE PHP RETURN
	if (OBJ_ControllerData.Stage == 1)
	{
		
		OBJ_ControllerData.Post.Form.Email = $('form input[name="Email"]').val();
		OBJ_ControllerData.Post.Form.Password = $('form input[name="Password"]').val();
		
		console.log( OBJ_ControllerData ); // REMOVE AFTER DEBUG
	}
	
	// RUN AFTER PHP RETURN
	else if (OBJ_ControllerData.Stage == 2)
	{
		OBJ_ControllerData.Display.Redirect = 'https://development.edwardgough.co.uk/Layout/Profile.php';
	}
	
	return OBJ_ControllerData;
}


// USER ACCOUNT LOGOUT FUNCTION
function Logout(OBJ_ControllerData)
{
	// RUN BEFORE PHP RETURN
	if (OBJ_ControllerData.Stage == 1)
	{
		console.log( OBJ_ControllerData );
	}
	
	// RUN AFTER PHP RETURN
	else if (OBJ_ControllerData.Stage == 2)
	{
		OBJ_ControllerData.Display.Redirect = 'https://development.edwardgough.co.uk/Layout';
	}
	
	return OBJ_ControllerData;
}





// --------------- [ ???? ]













