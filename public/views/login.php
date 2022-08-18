<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>
        Login page
    </title>

</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img class="logo-img" src="public/img/logo.svg">
        </div>
        <div class="login-container">
            <form class="login-form" action="login" method="POST">
                <div class="messages">
                    <?php
                        if(isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                        }
                    }
                    ?>
                </div>
                <input class="credentials-input" name="email" type="text" placeholder="email@email.com">
                <input class="credentials-input" name="password" type="password" placeholder="password">
                <button class="sign-button" type="submit">Sign in</button>
                <span class="or_sep"><hr>or<hr></span>
                <button class="sign-button">Sign up</button>
            </form>
        </div>
    </div>
</body>