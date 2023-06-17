<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="public/css/page_community/section_community_draft.css">
    <script src="https://kit.fontawesome.com/36e2e0d045.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/searchPeople.js" defer></script>
    <title>Community</title>

</head>
<body>
    <div class="base-container">
        <nav>
            <img class="logo-img" src="public/img/logo-no-background.svg">
            <ul>
                <li>
                    <a href='/reviews' class="nav-button">
                        <i class="fa-solid fa-rectangle-list"></i>
                        <span class="nav-button-text">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href='/community' class="nav-button">
                        <i class="fa-solid fa-user-group active"></i>
                        <span class="nav-button-text">Community</span>
                </a>
                </li>
                <li>
                    <a href='#' class="nav-button">
                        <i class="fa-solid fa-shirt"></i>
                        <span class="nav-button-text">Guide</span>
                    </a>
                </li>
                <li>
                    <a href='#' class="nav-button">
                        <i class="fa-solid fa-bell"></i>
                        <span class="nav-button-text">Notifications</span>
                    </a>
                </li>
                <li>
                    <a href='/logout' class="nav-button">
                        <i class="fa-solid fa-person-walking-arrow-right fa-flip-horizontal"></i>
                        <span class="nav-button-text">Logout</span>
                    </a>
                </li>
            </ul>

        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <input class="search-input" type="text" placeholder="Search people">
                </div>
                <div class="page-option">
                    
                    <a href='#' class="nav-button">
                        <i class="fa-solid fa-user"></i>
                        <span class="nav-button-text">My account</span>
                    </a>

                </div>

            </header>
            <section class="community">
                <?php foreach ($users as $user): ?>
                <div class="person" id="person_1">
                    <div class="image-section">
                        <img src="public/uploads/avatars/<?= $user->getAvatar(); ?>">
                    </div>
                    <div class="nickname">
                        <span class="name"><?= $user->getName();?> <?=$user->getSurname();?></span>
                    </div>
                    <div class="bike-model">
                        <span><?= $user->getBike(); ?></span>
                    </div>
                    <div class="info-section">
                        <span><?= $user->getInterest1(); ?></span>
                        <span><?= $user->getInterest2(); ?></span>
                        <span><?= $user->getInterest3(); ?></span>
                    </div>
                    <div class="social-section">
                        <b>SUBSCRIBERS</b>
                        <div class="subs-img">
                            <img src="public/img/uploads/people/p2.png">
                            <img src="public/img/uploads/people/p3.png">
                            <img src="public/img/uploads/people/p4.png">
                            <img src="public/img/uploads/people/p5.png">
                            <div class="subs-extra"><b>+7</b></div>
                        </div>

                    </div>

                </div>
                <?php endforeach; ?>
            </section>
        </main>

    </div>

</body>

<template id="user-template">
    <div class="person" id="">
        <div class="image-section">
            <img src="">
        </div>
        <div class="nickname">
            <span class="name">name</span>
        </div>
        <div class="bike-model">
            <span>bike</span>
        </div>
        <div class="info-section">
            <span class="interest1">interest1</span>
            <span class="interest2">interest2</span>
            <span class="interest3">interest3</span>
        </div>
        <div class="social-section">
            <b>SUBSCRIBERS</b>
            <div class="subs-img">
                <img src="public/img/uploads/people/p2.png">
                <img src="public/img/uploads/people/p3.png">
                <img src="public/img/uploads/people/p4.png">
                <img src="public/img/uploads/people/p5.png">
                <div class="subs-extra"><b>+7</b></div>
            </div>

        </div>

    </div>
</template>
