<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/CSS/style.css">
    <title>UPLOAD</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <a href="http://localhost:8080" target="blank">
                <img class="fit2" src="public/img/logo.svg">
            </a>
        </div>
        <div class="credentials">
                <form action="addfile" method="POST" ENCTYPE="multipart/form-data">
                    <h1>UPLOAD</h1>
                    <div class="messages">
                        <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input name="title" type="text" placeholder="title">
                    <textarea name="description" rows=5 placeholder="description"></textarea>

                    <input type="file" name="file"/><br/>
                    <button type="submit">create</button>
                </form>
        </div>
    </div>
</body>