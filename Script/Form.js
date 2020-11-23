

/* #####  FORM JS FILE - 0.01  #####*/




// --------------- [ AUTOMATIONS ]


// IMMEDIATELY STOP THE DEFAULT ACTION ON FORM ELEMENT
Stop_Default_Action ( 'form button', 'click');





// --------------- [ CONTROLLER FUNCTIONS ]



//
function Post_Controller_Data(OBJ_ControllerData)
{
	// POST CONTROLLER DATA OBJECT
	$.ajax({
		async: OBJ_ControllerData.Post.Async,
		method: OBJ_ControllerData.Post.Method,
		url: OBJ_ControllerData.Post.URL,
		data:{ ControllerData: JSON.stringify( OBJ_ControllerData )}
	})
	
	// ON POST COMPLETION 
	.done( function(OBJ_Returned_ControllerData)
	{
		console.log(
			OBJ_Returned_ControllerData
		);
		
		OBJ_ControllerData = window[ OBJ_ControllerData.Action.Name ]( JSON.parse(OBJ_Returned_ControllerData) );
	});
	
	return OBJ_ControllerData;
}



// PREVENT DEFAULT ACTION - PASS JQUERY ELEMENT AND EVENT TYPE STRING
function Stop_Default_Action(Element, Event)
{
	$(Element).on(Event, function(E){ E.preventDefault(); });
	
	// KEEP DURING DEBUG
	console.warn( Element + " has default overidden... " );
}




// --------------- [ EVENT HANDLING ]


// 
$('[data-action]').on('click', function (Event)
{
	// BUILD CONTROLLER DATA OBJECT - PASSED THROUGHOUT SYSTEM
	let OBJ_ControllerData = {};
		OBJ_ControllerData.History = {};
		
		OBJ_ControllerData.Action = {};
		OBJ_ControllerData.Action.Name = $(this).attr('data-action');
		
		OBJ_ControllerData.Validation = {};
		OBJ_ControllerData.Validation.Name = $(this).attr('data-validation');
		
		OBJ_ControllerData.Display = {};
		
		OBJ_ControllerData.Session = {};
		
		OBJ_ControllerData.Element = {};
		OBJ_ControllerData.Element.Clicked = $(this);
		OBJ_ControllerData.Element.Form = {};
		
		OBJ_ControllerData.Post = {};
		OBJ_ControllerData.Post.Async = false;
		OBJ_ControllerData.Post.Method = 'POST';
		OBJ_ControllerData.Post.URL = '/Layout/Class/Controller.Class.php';
		
		OBJ_ControllerData.Stage = 1;
	
	console.log( OBJ_ControllerData );  // REMOVE AFTER DEBUG

	// POST CONTROLLER DATA TO BACKEND
	OBJ_ControllerData = Post_Controller_Data(OBJ_ControllerData);
	
	
	
	if (OBJ_ControllerData.Display.Redirect)
	{
		alert( "CHANGING URL..." );
		window.location = OBJ_ControllerData.Display.Redirect;
	}
	
});


/*
// HANDLE ELEMENT ACTIONS & EVENTS
$('[data-action]').on('click', function( Event )
{

	// BUILD CONTROLLER OBJECT - PASSED THROUGH ALL FUNCTIONS
	let Controller = {};
		Controller.Action = 		$(this).attr('data-action');
		Controller.Element =		$(this);
	
	console.log( 
		Controller
	);
	
	// RUN ACTION FUNCTION
	Controller = window[Controller.Action](Controller);
	
	console.log( "POST TO CLASS: " + JSON.stringify(Controller) );
	
	// FUNCTION RAN PUSH TO CLASS
	if (!Controller.Return)
	{
		$.ajax({
			async: false,
			method: 'POST',
			url: '/Layout/Class/Controller.Class.php',
			data:
			{
				Controller: JSON.stringify(Controller)
			}
		})
		
		// AFTER ASYNC CALL
		.done(function(PHP_Return)
		{
			// RUN ACTION FUNCTION
			// Controller = window[Controller.Action](PHP_Return);
			
			console.log("RETURN FROM CLASS: " + PHP_Return);
			
			Controller = window[Controller.Action](JSON.parse(PHP_Return));
		});	
	}
});
*/
