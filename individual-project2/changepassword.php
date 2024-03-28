<?php  
	$username = $_POST["username"];
	$password = $_POST["password"]; 
	if (isset($username) and isset($password)){
		echo "Debug> changepassword.php-> got Username=$username; NewPassword=$password";
	}else{
		echo "No username/password provided to change!";
		exit();
	}
  	function addnewuser($username, $password) {
		$mysqli	 = new mysqli('localhost','vemurikl','Anjali@246','waph');
		if ($mysqli->connect_errno){
			printf("Database Connection Failed: %s\n", $mysqli->connect_error);
			return FALSE;
		} 
		 $prepared_sql ="INSERT INTO users (username,password) VALUES (?,md5(?));";
		 $stmt = $mysqli->prepare($prepared_sql);
		 $stmt-> bind_param("ss",$username,$password);
		 if($stmt->execute()) return TRUE;
		  return FALSE;
  	}
?>
