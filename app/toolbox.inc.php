<?php
/**
 * Checks if the user is connected
 * 
 * @return bool True if connected, false instead
 */
function isConnected(){
	if(isset($_SESSION['id'])){
		// Is connected
		return true;
	} else {
		// Is not connected
		return false;
	}
}

/**
 * Checks if the user is an admin
 * 
 * @return bool True if admin, False instead
 */
function isAdmin(){
	if(isConnected()){
		// Is connected
		if($_SESSION['role']==1){
			// Is admin : ok
			return true;
		} else {
			// Is not admin
			return false;
		}
	} else {
		// Is not connected
		return false;
	}
}

/**
 * Checks if the user is from an company
 * 
 * @return bool True if admin, False instead
 */
function isCompany(){
	if(isConnected()){
		// Is connected
		if($_SESSION['role']==2){
			// Is admin : ok
			return true;
		} else {
			// Is not admin
			return false;
		}
	} else {
		// Is not connected
		return false;
	}
}

/**
 * Checks if the user is an candidate
 * 
 * @return bool True if admin, False instead
 */
function isCandidate(){
	if(isConnected()){
		// Is connected
		if($_SESSION['role']==3){
			// Is admin : ok
			return true;
		} else {
			// Is not admin
			return false;
		}
	} else {
		// Is not connected
		return false;
	}
}

/**
 * Checks if it's an job offer
 * 
 * @return bool True if admin, False instead
 */
function isOffer(){
	if($_SESSION['role']==3){
		// Is admin : ok
		return true;
	} else {
		// Is not admin
		return false;
	}
}

/**
 * Checks if it's an user apply
 * 
 * @return bool True if admin, False instead
 */
function isApply(){
	if($_GET['id'] == 6 ){
		// Is admin : ok
		return true;
	} else {
		// Is not admin
		return false;
	}
}

?>