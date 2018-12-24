<?php
    session_start();
    require_once("../function/define.php");
    require_once("../function/fun_login.php");
    require_once("../function/fun_precheck.php");

    if(!isset($_SESSION['']))

    $user_id=trim($_POST['username']);
	$user_nick=$_POST['nickname'];
	$user_pwd=$_POST['password'];
	$user_pwdII=$_POST['password_again'];
	$user_school=$_POST['school'];
	$user_email=$_POST['email'];
    $user_ip=$_SERVER['REMOTE_ADDR'];
    //remove slash
    if (get_magic_quotes_gpc ()) {
		$user_id= stripslashes ($user_id);
		$user_nick= stripslashes ($user_nick);
		$user_pwd= stripslashes ($user_pwd);
    }

    //加密
    $password = PasswordEncode($user_pwd);

    if( isUseridExist($user_id, $pdo)) {
        exit("User ID Exist");
    }

    $sql = $pdo->prepare("INSERT INTO `UserInfo`
        (user_id, email, ip, accesstime, password, reg_time, nick, school)
        VALUE(?,?,?,NOW(),?,NOW(),?,?)");

    $sql->execute(array($user_id, $user_email, $user_ip, $password, $user_nick, $user_school));
    //注册完直接登录
    $login = Check($user_id, $user_pwd, $pdo);

    if($login) {
        $_SESSION['user_id'] = $login;
        echo "success\n  
		<script language='javascript'>\n 
		    window.location.replace('../userinfo.php');\n
		</script>";
    }
?>