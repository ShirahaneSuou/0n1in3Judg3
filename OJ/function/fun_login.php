<?php
    //sha1 160bit 摘要 换算=20字节
    //md5  128bit      换算=18字节
    //base64 4/3倍字节
    //salt 取随机4字节
    function PasswordEncode($pw, $haveMD5 = false) {
        if(!$haveMD5)
            $pw = md5($pw);
        $salt = sha1(rand());
        $salt = substr($salt, 0, 4);
        $hash = base64_encode(sha1($pw.$salt, true).$salt);
        return $hash;
    }
    function ComparePassword($right, $input) {
        $flag = 0;
        for($i = 0; $i < strlen($right); $i++) {
            $ch = $right[$i];
            if(('0' <= $ch && $ch <= '9') 
            || ('a' <= $ch && $ch <= 'f') 
            || ('A' <= $ch && $ch <= 'F'))
                continue;
            else {
                echo "$ch";
                $flag = 1;
                break;
            }
        }
        if($flag == 0) {
            $ninput = md5($input);
            return ($ninput == $right) ? true : false;
        }
        // encode input 
        $base64Decode = base64_decode($right);
        $salt = substr($base64Decode, 20);//前20字节是 sha1加密的 经过md5加密的密码连接盐 的摘要
        $hash = base64_encode(sha1( md5($input).$salt, true ).$salt);
        //echo "{$hash} | {$right}";
        // 
        if(strcmp($hash, $right) == 0) {
            return true;
        }
        else {
            return false;
        }
    }
    function Check($user_id, $password, $pdo){
        session_destroy();
        session_start();

        $sql = $pdo->prepare("SELECT `user_id`, `password` FROM `UserInfo` WHERE `user_id`=?");
        $sql->execute(array($user_id));
        $result = $sql->fetchAll();
        if($result && ComparePassword($result[0]['password'], $password)) {
            $user_id = $result[0]['user_id'];
            return $user_id;
        }
        return false;
    }

?>