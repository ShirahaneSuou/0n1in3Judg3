<?php
    session_start();
    require_once("./function/define.php");
    require_once("./function/fun_precheck.php");

    $pid = -1;
    if(isset($_GET["pid"])) {
        $pid = intval($_GET["pid"]);
    } 
    else {
        $ERR_MSG = "404 Problem Not found";
        exit("$ERR_MSG");
    } 
    $sql = $pdo->prepare("SELECT * FROM problem 
            WHERE problem_id = ?");
    $sql->execute(array($pid));
    $problemInfo = $sql->fetch(PDO::FETCH_ASSOC);

    if(!$problemInfo) {
        $ERR_MSG = "403 Problem Get Failed";
        exit("$ERR_MSG");
    }

    require("./view/problem.php");
?>