<?php
    session_start();
    require_once("./function/define.php");
    require_once("./function/fun_precheck.php");
    require_once("./function/fun_misc.php");
    $numPage = -1;
    $numPage = isset($_GET["p"]) ? intval($_GET["p"]) : 1;
    if($numPage < 1) {
        $numPage = 1;
    }
    $mincount = intval(($numPage - 1) * 50);
    $maxcount = intval($numPage * 50);
    $sql = $pdo->prepare("SELECT * FROM `problem` ORDER BY `problem_id`  LIMIT ?, ?");
    $sql->bindParam(1, $mincount, PDO::PARAM_INT);
    $sql->bindParam(2, $maxcount, PDO::PARAM_INT);
    $sql->execute();
 //    try {
 //    	$sql->execute(array($mincount, $maxcount));//传值有问题 估计是被加了引号 真够傻逼的
	// } catch(PDOException $e){
	// 	 echo  "\n" .$e->getMessage();
	// }
    $problemlist = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo $sql->fetch(PDO::FETCH_ASSOC);
    if(!$problemlist) {
    	$ERR_MSG = "403 ProblemSet Get Failed Or No such Problem";
        exit("$ERR_MSG");
    }
    $sql = $pdo->prepare("SELECT COUNT(*) FROM problem");
    $totalcnt = $sql->execute();
    if(!$totalcnt) {
    	$ERR_MSG = "403 ProblemSet Get Failed";
        exit("$ERR_MSG");
    }

    require("./view/problemset.php");

?>