<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/CSS/style.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>VPlay</title>
</head>
<body>
    <div class="container2">
        <div class="vertical">
            <div class="header">
                <div class="homeLogo"></div>
                <input class="search" name="search" type="text" placeholder="search">
                <form action="login">
                    <button>Login</button>
                </form>
            </div>
            <div class="underline"></div>
        </div>
        <div class="vertical2">
            <div class="header2">
                <div class="sectitle">Best rated</div>
                <button class="arrowLeft"></button>
                <button class="arrowRight"></button>
            </div>
            <div class="underline"></div>
            <div class="c">
                <?php foreach($projects as $project): ?>
                    <div id="project-1">
                        <img src="public/uploads/<?= $project->getImage(); ?>">
                        <div>
                            <h2><?= $project->getTitle(); ?></h2>
                            <p><?= $project->getDescription(); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="vertical2">
            <div class="header2">
                <div class="sectitle">Best rated</div>
                <button class="arrowLeft"></button>
                <button class="arrowRight"></button>
            </div>
            <div class="underline"></div>
            <div class="header">
                <div class="thumbnail">
                    <div class="title">Sample</div>
                </div>
                <div class="thumbnail">
                    <div class="title">Sample</div>
                </div>
                <div class="thumbnail">
                    <div class="title">Sample</div>
                </div>
                <div class="thumbnail">
                    <div class="title">Sample</div>
                </div>
            </div>
        </div>
    </div>
</body>

<template id="project-template">
    <div id="">
        <img src="">
        <div>
            <h2>title</h2>
            <p>description</p>
        </div>
    </div>
</template>