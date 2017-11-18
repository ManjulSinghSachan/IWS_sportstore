<<<<<<< b4bc6392ea8e3c5a913ec907945fdb7ef67ecde9

<?php
	
	function logged_in() {
		if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
			//echo $_SESSION['user_id'];
			return true;
		}
		else 
	        return false;
	}
=======

<?php
	
	function logged_in() {
		if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
			//echo $_SESSION['user_id'];
			return true;
		}
		else 
	        return false;
	}
>>>>>>> recommendation
?>