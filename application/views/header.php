﻿<?php

$top_fst_text = "Log In";
$top_snd_text = "Sign Up";
$top_fst_link = "#popup1";
$top_snd_link = "#popup1";


if(Session::isSessionSet("loggedIn")){
    $top_fst_text = "";
    $top_snd_text = "";
    $top_fst_link = "";
    $top_snd_link = "";
}

?>

<!DOCTYPE html>
<html>
<head>


    <!------------jquery import ----------->
    <script src="<?php echo URL?>public/js/jquery/jquery-3.1.0.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo URL?>public/js/jquery/jquery.form.js" type="text/javascript"></script>


    <!-- draggable import -->
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script> <!-- google ReCAPTCHA include-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- -------------------------------------------------------------------------
                            css reset, Java script, JS PlugIn

    <!-- css Plug In -->
    <link href="<?php echo URL?>css/css_reset.css" rel="stylesheet" />

    <!-- css custom -->
    <link media="screen" href="<?php echo URL?>css/style/pc.css" rel="stylesheet" />

    <!-- Javascript custom -->
    <script src="<?php echo URL?>js/jq-jh.js"></script>

    <!-- Form process -->
    <script src="<?php echo URL?>js/login-signup/form.js"></script>

    <link rel="stylesheet" href="<?php echo URL?>css/style.css">

    <!-- Tile Display -->
    <script type="text/javascript" src="<?php echo URL?>js/tiledisplay/freewall.js"></script>

    <!-- Error Message -->
    <link rel="stylesheet" href="<?php echo URL?>css/errormessage.css">

    <!-- Tag it -->
    <link href="<?php echo URL?>css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL?>css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
    <script src="<?php echo URL?>js/tag-it/tag-it.js" type="text/javascript" charset="utf-8"></script>

    <!-- page handler-->
    <script type="text/javascript" src="<?php echo URL?>js/ajax-page-call.js"></script>
    <link rel="shortcut icon" href="<?php echo URL?>img/pavicon/untitled.png">
</head>
<header style="z-index:100;">
    <?php if(Session::isSessionSet("intro") == false){ ?>
        <div class="info-content">
            <!--<iframe src="http://pollo112.wixsite.com/wintle-landingpage"></iframe>-->
            <div class="introbtn" onclick="<?php Session::set("intro",false)?>">시작하기</div>
        </div>
    <?php }else{ ?>
        <script>
            $(".info-content").css("display","hide");
            $("header").css("height","37px");
        </script>
    <?php } ?>

    <!--<video id="video" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
        <source src="background/file.webm">
    </video>-->

    <!--<div id="fullpage">
        <div class="section " id="section0">
            <div class="content">
                <div class="contaner">
                    <img class="intro" src="img/PAGE/main_logo.png"/>
                </div>
            </div>
            <img class="paper_cap" src="img/PAGE/Cloud_paper_top.png" alt=""/>
        </div>
        <div class="section " id="section1"></div>

        <div class="section " id="section2"></div>

    </div>-->

    <!-- <div class="info-content">
         <div class="introbtn">뮤지션에 도전하기</div>
     </div>
-->
    <div id="header-gnb">
        <div class="HeaderImg1">  <!-- HeaderImg[i] {0 : 홈 버튼, 1 : 로고, 2 : 메뉴 버튼} -->
            <img src="<?php echo URL?>img/pavicon/logo_white_scaled.png" style="height:37px"  onclick="$.pagehandler.loadContent('<?php echo URL?>index','all');">
        </div>

        <!--<div class="MemberShipBtn0">
            <p id="menu page-a" onclick="$.pagehandler.loadContent('<?php /*echo URL."index"*/?>','all');">Page A</p>
            <p id="menu page-b" onclick="$.pagehandler.loadContent('<?php /*echo URL."albumartall"*/?>','all');">Page B</p>
        </div>-->

        <div style="position:absolute; left:340px; height:30px; top:0;">
            <img src="img/fire.png" style="width:40px;">
        </div>

        <div style="position:absolute; left:400px; height:30px; top:5px;">
            <img src="img/seed.png" style="width:30px;">
        </div>

        <div  style="position:absolute; left:500px; height:30px; top:5px;">
            <img src="img/searchbar.png" style="height:26px; width:100%">
        </div>

        <div class="MemberShipBtn1" style="top:10px; right:110px;">  <!-- MemberShipBtn[n] {0 : 입장 전, 1 : 입장 후 (로그인 X)} -->
            <a href="<?php echo $top_fst_link?>" id="top_login"><?php echo $top_fst_text?></a>
            <a href="<?php echo $top_snd_link?>" id="top_login"><?php echo $top_snd_text?></a>
            <a style="right:10px">Daniel Choi</a>
        </div>
        <div class="MemberShipBtn1" style="position:relative;display:inline-block; right:120px; top:7px;">
            <img src="img/groups.png" style="width:25px">
        </div>

        <div style="position:absolute; right:213px; height:30px; top:7px;">
            <img src="img/warning.svg" style="width:25px;">
        </div>

        <div style="position:absolute; right:160px; height:30px; top:7px;">
            <img src="img/setting.svg" style="width:25px;">
        </div>

        <div style="position:absolute; right:25px; height:37px;">
            <a href="<?php echo URL?>webstudio"><img src="<?php echo URL?>img/beta.png" style="height:37px"></a>
        </div>
    </div>
    </div>
</header>
<!--
    <script type="text/javascript" src="js/mainpage/javascript.fullPage.js"></script>
    <script type="text/javascript">
        fullpage.initialize('#fullpage', {
            anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
            menu: '#menu',
            css3: true
        });
    </script>-->

