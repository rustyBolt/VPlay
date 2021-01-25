<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/CSS/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Creating account</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <a href="http://localhost:8080" target="blank">
                <img class="fit2" src="public/img/logo.svg">
            </a>
        </div>
        <div class="credentials">
            <form action="createAccount" method="POST">
                <div class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <input name="passwordagain" type="password" placeholder="repeat password">
                <input name="name" type="text" placeholder="name">
                <input name="surname" type="text" placeholder="surname">
                <button type="submit">Create an account</button>
            </form>
        </div>
    </div>
</body>