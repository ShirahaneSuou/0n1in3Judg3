<?php
    session_start();
    require_once("./function/define.php");
    require_once("./function/fun_precheck.php");

    $numPage = -1;
    $numPage = isset($_GET["p"]) ? intval($_GET["p"]) : 1;
    if($numPage < 1) {
        $numPage = 1;
    }
    //privilege judge
    if(isset($_SESSION['administrator'])
    ||isset($_SESSION['source_browser'])
    || (isset($_SESSION['user_id']) && isset($_GET['user_id'])  )  ) {

    }
    $strSQL = "SELECT * FROM solution WHERE contest_id IS NULL";
    $orderby = " ORDER BY solution_id DESC ";
    $cntSolutions = 50;
    $top = -1;
    $problem_id = "";
    $user_id = "";
    $language = -1;
    
    if (isset($_GET['top']) && $_GET['top'] != "") {
		$top = intval($_GET['top']);
        if ($top != -1) {
            $strSQL = $strSQL . "AND `solution_id` <= '{$top}' ";
        }
    }
    if (isset($_GET['pid']) && $_GET['pid'] != "") {
		$problem_id = intval($_GET['pid']);
        if ($problem_id != 0) {
			$strSQL = $strSQL . " AND problem_id = '{$problem_id}' ";
        } 
        else {
			$problem_id = "";
		}
    }   
    
    if(isset($_GET['uid']) && $_GET['uid'] != "" ) {
        $user_id = trim($_GET['uid']);
        if( isUseridExist($user_id, $pdo) && $user_id != "") {
            $strSQL = $strSQL." AND `user_id` = {$user_id} ";
        }
        else {
            $iser_id = "";
        }
    }

    if(isset($_GET['language'])) {
        $language = intval($_GET['language']);
    }
    if($language < 0) {
        $language = -1;
    }
    if($language != -1) {
        $strSQL = $strSQL." AND `language` = {$language} ";
    }

    if(isset($_GET['judgeresult'])) {
        $result = intval($_GET['judgeresult']);
    }
    if($result < 0) {
        $result = -1;   
    }
    if($result != -1) {
        $strSQL = $strSQL." AND result = '{$result}' ";
    }
    $mincount = intval(($numPage - 1) * 50);
    $maxcount = intval($numPage * 50);
    $strSQL = $strSQL.$orderby." LIMIT {$mincount}, {$maxcount} ";
    $sql = $pdo->prepare($strSQL);
    $sql->execute();
    $statuList = $sql->fetchAll(PDO::FETCH_ASSOC);
    $totalCount = count($statuList);

    //$prevPage = ($totalCount==0 || $totalCount - 50 <= 0 ) ? "" : intval();
    //$nexPage = ($totalCount==0 || $totalCount + 50 > $ ) ? "" : intval();
    require("./view/status.php");
?>

