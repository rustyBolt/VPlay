<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="public/CSS/play.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <script type="text/javascript" src="./public/js/play.js" defer></script>
    <title>VPlay</title>
</head>
<body>
    <div class="container2">
        <div class="vertical">
            <div class="header">
                <div class="homeLogo">
                    <a href="http://localhost:8080" target="blank">
                        <img class="fit" src="public/img/logo.svg">
                    </a>
                </div>
                <?php session_start()?>
                <?php if(isset($_SESSION["id"])): ?>
                    <form action="logout">
                        <button>
                            <i class="icon-logout"></i>
                        </button>
                    </form>
                    <form action="hub">
                        <button>
                            HUB
                        </button>
                    </form>
                <?php else: ?>
                    <form action="login">
                        <button>
                            <i class="icon-login"></i>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="underline"></div>
        </div>
        <div class="play">
            <div class="title"><?php echo $_GET['title']; ?></div>
            <button name="play" onclick="loadJSON('./public/uploads/<?php echo $_GET['title']; ?>/game.json')">PLAY</button>
            <div class="area">
                <div class="people">
                    <div class="lp"></div>
                    <div class="separator"></div>
                    <div class="rp"></div>
                </div>
                <div class="conversation"></div>
            </div>
        </div>
    </div>
</body>