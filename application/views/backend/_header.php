<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CIGenerator网站后台</title>
        <link href="/asset/backend/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/asset/js/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="/plugins/zebra_datepicker/javascript/zebra_datepicker.js"></script>
        <link rel="stylesheet" href="/plugins/zebra_datepicker/css/default.css" type="text/css" />
        <script type="text/javascript" src="/asset/backend/public.js"></script>
    </head>

    <body>
        <div class="wapper">
            <div class="header">
                <div class="logo">
                    <a href="<?php echo B_URL; ?>home" ><img src="/asset/backend/images/logo.gif" /></a>
                </div>
            </div>
            <div class="nav">
                <div class="navLeft">
                    <a href="/" target="_blank" title="查看网站首页"><img src="/asset/backend/images/home_btn.png" /></a>
                </div>
                <div class="navRight">
                    <?php if (isset($_SESSION['adminId'])) : ?>
                    欢迎回来, <?php echo $_SESSION['adminUsername']; ?>&nbsp;&nbsp;<a href="<?php echo B_URL; ?>login/logout" class="white">登出</a>
                    <?php endif; ?>
                </div>
                <div class="clear"></div>
            </div>