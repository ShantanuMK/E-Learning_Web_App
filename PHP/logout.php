<?php
	session_start();
	unset($_SESSION['sname']);
	unset($_SESSION['sid']);
	unset($_SESSION['tname']);
	unset($_SESSION['tid']);
	unset($_SESSION['school_id']);
	unset($_SESSION['school_name']);
	unset($_SESSION['cstd']);
	unset($_SESSION['cdiv']);
	unset($_SESSION['eqnum']);
	unset($_SESSION['enum']);
	unset($_SESSION['ename']);
	unset($_SESSION['edate']);
	unset($_SESSION['subid']);
	unset($_SESSION['subname']);

	session_destroy();
	header("Location: index.php");
?>
