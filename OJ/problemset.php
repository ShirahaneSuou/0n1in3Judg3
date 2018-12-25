<?php
    session_start();
    require_once("./function/define.php");
    require_once("./function/fun_precheck.php");
    require_once("./function/fun_misc.php");

    $numPage = isset($_GET["P"]) ? $_GET["p"] : 1;
    if($numPage < 1) {
        $numPage = 1;
    }
    require("./view/problemset.php");

?>