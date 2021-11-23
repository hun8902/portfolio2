<?
	$mysqli = @new mysqli("localhost", "purplefriendsweb", "purp0513", "purplefriendsweb");

	if (mysqli_connect_errno()) {
		die("ERROR : " . mysqli_connect_error());
	}
?>