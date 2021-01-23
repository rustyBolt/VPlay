<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="public/CSS/creator.css">
    <script type="text/javascript" src="./public/js/create.js" defer></script>
    <title>CREATOR</title>
</head>
<body>
    <div class="workbench">
        <div class="tools">
            <input name="file" type="file"/>
            <button onclick="addFile('<?php echo $title; ?>', 'area')">Background</button>
            <button onclick="addFile('<?php echo $title; ?>', 'lp')">Left Speaker</button>
            <button onclick="addFile('<?php echo $title; ?>', 'rp')">Right Speaker</button>
            <textarea name="text" rows="6" cols="20"></textarea>
            <button onclick="addText()">Text</button>
            <button onclick="addScene()">Add Scene</button>
            <button onclick="addGame('<?php echo $title; ?>')">Add Game</button>
        </div>
        <div class="area">
            <div class="people">
                <div class="lp"></div>
                <div class="separator"></div>
                <div class="rp"></div>
            </div>
            <div class="conversation"></div>
        </div>
    </div>
</body>