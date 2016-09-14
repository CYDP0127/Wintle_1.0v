<?php

$top_fst_text = "Log In";
$top_snd_text = "Sign Up";
$top_fst_link = "#popup1";
$top_snd_link = "#popup1";


if(Session::isSessionSet("loggedIn")){
    $top_fst_text = "";
    $top_snd_text = "Log Out";
    $top_fst_link = "";
    $top_snd_link = "logout/callLogOut";
}

?>
<html>
<head>
    <!------------jquery import ----------->
    <script src="<?echo ROOT.DS.'public'.DS.'js'.DS.'jquery'.DS.'jquery-3.1.0.js'?>" type="text/javascript" charset="utf-8"></script>
    <!-- css Plug In -->
    <link href="css/css_reset.css" rel="stylesheet" />

    <!-- css custom -->
    <link media="screen" href="css/style/pc.css" rel="stylesheet" />
    <link media="handheld" href="css/style/mobile.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css">

</head>
<header style="height: 50px;">
    <div id="header-gnb">
        <div class="HeaderImg1">  <!-- HeaderImg[i] {0 : 홈 버튼, 1 : 로고, 2 : 메뉴 버튼} -->
            <a href="index.php"><img src="img/pavicon/logo_white_scaled.png" style="height:50px"></a>
        </div>
        <div class="MemberShipBtn1">  <!-- MemberShipBtn[n] {0 : 입장 전, 1 : 입장 후 (로그인 X)} -->
            <a href="<?php echo $top_fst_link?>" id="top_login"><?php echo $top_fst_text?></a>
            <a href="<?php echo $top_snd_link?>" id="top_login"><?php echo $top_snd_text?></a>
        </div>
    </div>
</header>