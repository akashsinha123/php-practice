<?php 
	
	define('MAILING_LIST', $_SERVER['DOCUMENT_ROOT'] . '/Akash/bicku/mailing_list.php');

	// Add a new item to the regisered users list;
	function add_registration_user($name, $email) {
		//# Really Important: SECURE FILE; use ../ 
		file_put_contents(MAILING_LIST, "$name: $email\n", FILE_APPEND);
	}

	
	//Preserve form state.
	function old($key){
		if (!empty($_REQUEST[$key])) {
			return htmlspecialchars($_REQUEST[$key]);
		}
		return '';
	}

	//Determines whether an email address is valid.
	function valid_email($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}


	//fetches users data from the file with stored data.
	function get_registered_users($path = MAILING_LIST) {
		$users = file($path);
		// print_r(explode(': ', $users[0]));
		if ( count($users) ) {
			return array_map(function($user) {
				// $bits = explode(': ', $user);
				//return array_map('htmlspecialchars', $bits);
				return explode(': ', htmlspecialchars($user));
			}, $users);
		}

		return false;
	}





