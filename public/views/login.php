<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/CSS/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            placeholder
        </div>
        <div class="credentials">
            <form action="login", method="POST">
                <div class="message">
                    <?php if(isset($messages)){
                        foreach($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button type="submit">Login</button>
                <div class="or">OR</div>
                <button>Create an account</button>
            </form>
        </div>
    </div>
</body>