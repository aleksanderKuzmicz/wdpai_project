<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/login_register/register.css">
    <script src="https://kit.fontawesome.com/36e2e0d045.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>
        Gosafe register
    </title>

</head>
<body>
<div class="container">
    <div class="logo-container">
        <img class="logo-img" src="public/img/logo-no-background.svg">
    </div>
    <div class="register-container">
        <form class="register-form" action="register" method="POST" ENCTYPE="multipart/form-data">

            <input class="credentials-input" name="email" type="text" placeholder="email@email.com">
            <input class="credentials-input" name="password" type="password" placeholder="password">
            <input class="credentials-input" name="confirmedPassword" type="password" placeholder="confirm password">
            <input class="credentials-input" name="name" type="text" placeholder="name">
            <input class="credentials-input" name="surname" type="text" placeholder="surname">
            <span class="or_sep"><hr>Tell us more<hr></span>
            <input class="credentials-input" name="bike" type="text" placeholder="Your bike model">
            <input class="credentials-input" name="interest1" type="text" placeholder="Your interest">
            <input class="credentials-input" name="interest2" type="text" placeholder="Your interest">
            <input class="credentials-input" name="interest3" type="text" placeholder="Your interest">
            <label class="file-loader">
                <i class="fa fa-file-arrow-up active"></i>
                <input type="file" name="file">
            </label>
            <div class="messages">
                <?php
                if(isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <button class="submit-button" type="submit">Register</button>
        </form>
    </div>
</div>
</body>