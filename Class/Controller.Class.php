<?php
	
	
	// --------------- [ POSTED DATA HANDLER ]
	
	# HANDLE POSTED CONTROLLER DATA & PUST TO CONTROLLER CLASS

	# RETRIEVE CONTROLLER DATA
	$OBJ_ControllerData = $_POST['ControllerData'];
	
	# JSON STRING TO ARRAY CONVERSION
	$OBJ_ControllerData = json_decode( $OBJ_ControllerData );
	
	#
	$Class_['Controller'] = new Controller();
	$Class_['Controller'] -> Pathway($OBJ_ControllerData);
	

	
	
	// --------------- [ CLASS ]
	
	# 
	class Controller
	{
		
		# ------- [ HANDLER FUNCTIONS ]
		
		# EXECUTE CONTROLLER METHOD & RETURN JSON ENCODED STRING
		public function Pathway($OBJ_ControllerData)
		{
			
			# CHECK FOR ACTION CLASS
			if ($OBJ_ControllerData -> Action -> Name)
			{
				$OBJ_ControllerData = $this -> {$OBJ_ControllerData -> Action -> Name}($OBJ_ControllerData);
			}
			
			# BUILD AND RETURNC OTNROLLER
			$OBJ_ControllerData -> Stage = 2;
			
			echo json_encode( $OBJ_ControllerData );
		}
		
		
		
		
		# ------- [ ACCOUNT FUNCTIONS ]
		
		# USER ACCOUNT LOGIN FUNCTION
		private function Login($OBJ_ControllerData)
		{
			
			# DETERMINE WHETHER USER IS ALREADY LOGGED IN
			$OBJ_ControllerData -> Session -> LoggedIn = $this -> User_Is_Logged_In();
			
			# USER NOT CURRENTLY LOGGED IN
			if (!$OBJ_ControllerData -> Session -> LoggedIn)
			{
				# START USER SESSION
				SESSION_START();
				
				# BUILD USER SESSION ARRAY
				$_SESSION = [
					'User' => [
						'UserID' => 1,
						'Username' => 'Username1'
					],
					'Tracking' => [],
					'Setttings' => []
				];
				
				// UPDATE CONTROLLER DATA SESSION INFORMATION 
				$OBJ_ControllerData -> Session = $_SESSION;
			}
			
			return $OBJ_ControllerData;
		}
		
		
		# USER ACCOUNT LOGOUT FUNCTION
		private function Logout($OBJ_ControllerData)
		{
			SESSION_START();
			SESSION_UNSET();
			SESSION_DESTROY();
			
			return $OBJ_ControllerData;
		}
		
		
		# CHECK USER IS LOGGED IN
		private function User_Is_Logged_In()
		{
			if ( isset( $_SESSION['User'] ) ){ return true; }
			return false;
		}
		
		
		
		
		# ------- [ ??? FUNCTIONS ]
		
		
		
	}
	
	
?>