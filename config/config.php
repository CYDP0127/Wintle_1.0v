<?php

/** Configuration Variables **/

define ('DEVELOPMENT_ENVIRONMENT',true);

date_default_timezone_set("Asia/Seoul");

if($isServer){
    /* SERVER CONFIG */
    define("DBSERVERNAME", "localhost");     // The host you want to connect to.
    define("DBUSERNAME", "pollo112");    // The database username.
    define("DBPASSWORD", "wintle1091!");    // The database password.
    define("DBNAME", "pollo112");    // The database name.
    define("URL","https://www.wintle.co.kr/");
}else{
    /* WINDOWS TEST CONFIG */
    define("DBSERVERNAME", "localhost");     // The host you want to connect to.
    define("DBUSERNAME", "root");    // The database username.
    define("DBPASSWORD", "root");    // The database password.
    define("DBNAME", "wintle");    // The database name.
    define("URL","http://localhost/");
}


set_error_handler(function($errno, $errstr, $errfile, $errline ){
    if (error_reporting() == 0) {
        return;
    }
    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});
