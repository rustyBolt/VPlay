<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="./public/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/move.js" defer></script>
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
                <input class="search" name="search" type="text" placeholder="search">
                <form action="logout">
                    <button>
                        <i class="icon-logout"></i>
                    </button>
                </form>
            </div>
            <div class="underline"></div>
        </div>
        <div class="vertical2">
            <div class="header2">
                <div class="sectitle">Created</div>
                <form action="addfile">
                    <button class="create">+create</button>
                </form>
            </div>
            <div class="underline"></div>
            <div class="c">
                <?php foreach($projects as $project): ?>
                    <div id="project-1" onclick="move('<?= $project->getTitle(); ?>')">
                        <img src="public/uploads/<?= $project->getImage(); ?>">
                        <div>
                            <h2><?= $project->getTitle(); ?></h2>
                            <p><?= $project->getDescription(); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

<template id="project-template">
    <div id="" onclick="">
        <img src="">
        <div>
            <h2>title</h2>
            <p>description</p>
        </div>
    </div>
</template>