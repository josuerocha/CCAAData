<?PHP
session_start();
if(isset($_SESSION["email"]))
{
	
}
else{
	header("Location: login.php");
}

?>
