<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/login_register/login.css">
    <script src="https://kit.fontawesome.com/36e2e0d045.js" crossorigin="anonymous"></script>
    <title>
        Gosafe login
    </title>
    <link rel="icon" type="images/x-icon" href="public/img/logo-title.png"/>

</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img class="logo-img" src="public/img/logo-no-background.svg">
        </div>
        <div class="login-container">
            <form class="login-form" action="login" method="POST">
                <div class="messages">
                    <?php
                        // remake to object method. Project must be OOP
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
                <button class="sign-button" type="submit" formaction="/register">Sign up</button>
            </form>
        </div>
    </div>
</body>