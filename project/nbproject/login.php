<?php
	/*browseall.php*/
	
/*include functions*/
require_once(dirname(__FILE__).'/functions/database.php');	
require_once(dirname(__FILE__).'/commons/header.php');

if(isset($_GET['do_login'])){
	if($_POST['uname'] == 'test' && $_POST['pass'] == 'test'){
		$lifetime = time() + 120;
		$logged = isset($_SESSION['logged'])? $_SESSION['logged'] : 'test';
		$_SESSION['logged'] = $logged;
		header('location: http://localhost/psw2/index.php');
		exit();
	}
} else if(isset($_GET['logout'])){
	unset($_SESSION['logged']);
	header('location: http://localhost/psw2/login.php');
	exit();
}
?>
	<div align=center>
	<form method=post action="login.php?do_login=1">
		<table>
		<tr>
			<td>username</td>
			<td><input type=text name="uname"></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type=password name="pass"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type=submit value=login></td>
		</tr>
		</table>
	</form>
	</div>
<?php

require_once(dirname(__FILE__).'/commons/footer.php');
?>