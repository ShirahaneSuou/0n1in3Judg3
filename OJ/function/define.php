<?php
    //About of Language or result's infomations
    $LANGUAGE_NAME = Array("C","C++","Pascal","Java","Ruby","Bash","Python","PHP","Perl","C#","Obj-C","FreeBasic","Schema","Clang","Clang++","Lua","Other Language");
    $LANGUAGE_EXT = Array( "c", "cc", "pas", "java", "rb", "sh", "py", "php","pl", "cs","m","bas","scm","c","cc","lua" );
    $ALPHABET_N_NUM = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $JUDGE_RESULT=Array("Pending",
                        "Wait For Judge",
                        "Compiling",
                        "Running",
                        "Accepted",
                        "Presentation Error",
                        "Wrong Anwser",
                        "Time Limit Exceeded",
                        "Memory Limit Exceeded",
                        "Output Limit Exceeded",
                        "Runtime Error",
                        "Compile Error",
                        "Compile OK",
                        "TEST RUN");
    //result code
    $JUDGE_ROW_CSS_CLASS=Array("default",
                                "info",
                                "warning",
                                "warning",
                                "success",
                                "danger",
                                "danger",
                                "warning",
                                "warning",
                                "warning",
                                "warning",
                                "warning",
                                "warning",
                                "info"); 
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