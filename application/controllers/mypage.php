<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 10/11/2016
 * Time: 4:27 PM
 */

class MyPage extends Controller{

    function __construct() {
        parent::__construct();
    }

    function index($noInclude = false, $loggedIn = false){
        if($loggedIn == false){
            return false;
        }
        $this->view->render("mypage/index", $noInclude, $loggedIn);
    }

}