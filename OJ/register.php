<?php
    session_start();
    require_once("./function/define.php");
    if(isset($_SESSION["user_id"])  && isset($ERR_MSG) && $ERR_MSG != null) {
        $ERR_MSG = "Please Logout First";
        exit("{$ERR_MSG}");
    }
    require("./view/register.php");
?>