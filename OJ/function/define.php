<?php
    $ERR_MSG = null;

    $OJ_PATH = dirname(dirname(__FILE__));

    $OJ_CONFIG = null;

    if(file_exists("{$OJ_PATH}/config.php")) {
        require_once("{$OJ_PATH}/config.php");
    }
    else {
        $ERR_MSG = "ERROR: MISSING CONFIGURE FILE. CHECK <b>{\$OJ_PATH}/config.php</b>";
        exit("{$ERR_MSG}");
    }
    
    require("{$OJ_PATH}/function/define_db.php");
    ini_set("display_error", "On");

?>