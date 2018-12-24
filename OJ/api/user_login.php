<?php
    session_start();
    require_once("../function/define.php");
    require_once("../function/fun_login.php");
    require_once("../function/fun_precheck.php");
    $user_id = $_POST['username'];
    $password = $_POST['password'];

    if(get_magic_quotes_gpc()) {
        $user_id = stripslashes($user_id);
        $password = stripslashes($password);
    }

    $userid = Check($user_id, $password, $pdo);
    if ($userid) {
        $_SESSION['user_id'] = $userid;

        $sql = $pdo->prepare("SELECT * FROM `UserInfo` WHERE `user_id`=? ");
        $sql->execute(array($userid));
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user_name'] = $result['nick'];

        $sql = $pdo->prepare("SELECT `level` FROM `privilege` WHERE `user_id`=?");
        $sql->execute(array($userid));
        $op_result = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();

        foreach($op_result as $row) {
            $level = $row['level'];
            $_SESSION[$level] = true;
        }
        $_SESSION['is_operator'] = isOperator();

        echo "success";
        echo "<script language='javascript'>\n
                history.go(-2);\n
            </script>";
    }
    else {
        echo "failed";
        echo "{$userid}";
    }
?>