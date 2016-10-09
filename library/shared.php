<?php

/** Check if environment is development and display errors **/

function setReporting() {
    if ('DEVELOPMENT_ENVIRONMENT' == true) {
        error_reporting(E_ALL);
        ini_set('display_errors','On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
    }
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value) {
    $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
    return $value;
}

function removeMagicQuotes() {
    if ( get_magic_quotes_gpc() ) {
        $_GET    = stripSlashesDeep($_GET   );
        $_POST   = stripSlashesDeep($_POST  );
        $_COOKIE = stripSlashesDeep($_COOKIE);
    }
}

/** Check register globals and remove them **/

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Main Call Function **/

function callHook() {
    Session::init();

    $url = isset($_GET['url']) ? $_GET['url'] : null;

    $url = rtrim($url, '/');
    $url = explode('/', $url);
    $isloggedin = false;
    $isnoinclude = false;

    if (empty($url[0])) {
        $controller = new Index();
    }else{
        if (class_exists($url[0])){
            $controller = new $url[0];
        }else{
            error();
            return false;
        }
    }

    if(Session::isSessionSet("loggedIn")){
        $isloggedin = true;
    }else{
        $isloggedin = false;
    }

    if($url[0] == "webstudio"){
        $isnoinclude = true;
    }

    $controller->loadModel($url[0]);

    // calling methods
    if (isset($url[2])) {
        if (method_exists($controller, $url[1])) {
            $controller->{$url[1]}($url[2]);
        } else {
            error();
        }
    } else {
        if (isset($url[1])) {
            if($url[1] != 'index'){
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    error();
                }
            }
        } else {
            $controller->index($isnoinclude,$isloggedin);
        }
    }
}


/** Autoload any classes that are required **/

function __autoload($className) {
    if (file_exists(ROOT . DS . 'library' . DS . $className . '.class.php')) {
        require_once(ROOT . DS . 'library' . DS . $className . '.class.php');
    } else if (file_exists(ROOT . DS . 'application' . DS .'controllers' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'application' . DS .'controllers' . DS . strtolower($className) . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS .'models' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'application' . DS .'models' . DS . strtolower($className) . '.php');
    } else {
        /* Error Generation Code Here */
    }
}

function error() {
    $controller = new ErrorPage();
    $controller->index();
    return false;
}


setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();
