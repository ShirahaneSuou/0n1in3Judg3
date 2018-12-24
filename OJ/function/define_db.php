<?php
    switch($ENV_SQL) {
        case "STD_MYSQL":
		define('DB_NAME',$SQL_NAME);
		define('DB_HOST',$SQL_HOST);
		define('DB_PORT',$SQL_PORT); 
		define('DB_USER',$SQL_USERNAME);
		define('DB_PASS',$SQL_PASSWORD);
		break;
    }

    try{
        $dsn = 'mysql:dbname='. DB_NAME .';host='. DB_HOST .';port='.DB_PORT;
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->query("set names utf8;");
    } 
    catch(PDOException $e){
        echo "Database connect failed. Check the configure file and try again!";
		//echo $e->getMessage(); 
		exit(0);
    }
?>