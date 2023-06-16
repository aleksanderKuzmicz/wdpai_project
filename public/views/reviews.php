<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="public/css/page_reviews/section_reviews.css">
    <script src="https://kit.fontawesome.com/36e2e0d045.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/searchReview.js" defer></script>
    <title>Reviews</title>

</head>
<body>
    <div class="base-container">
        <nav>
            <img class="logo-img" src="public/img/logo-no-background.svg">
            <ul>
                <li>
                    <a href='/reviews' class="nav-button">
                        <i class="fa-solid fa-rectangle-list active"></i>
                        <span class="nav-button-text">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href='/community' class="nav-button">
                        <i class="fa-solid fa-user-group"></i>
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
                    <a href='#' class="nav-button">
                        <i class="fa-solid fa-gear"></i>
                        <span class="nav-button-text">Settings</span>
                    </a>
                </li>
            </ul>

        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <input class="search-input" type="text" placeholder="Search reviews">
                </div>
                <div class="page-option">
                    
                    <a href='#' class="nav-button">
                        <i class="fa-solid fa-plus"></i>
                        <span class="nav-button-text">Add review</span>
                    </a>

                </div>
            </header>
            <section class="reviews">
                <?php foreach ($reviews as $review): ?>
                <div class="review" id="review-1">
                    <img src="public/uploads/<?= $review->getImage(); ?>">
                    <div class="description-container">
                        <div class="review-description">
                            <h2><?= $review->getTitle(); ?></h2>
                            <p><?= $review->getDescription(); ?></p>
                            <div class="social-section">
                                <div class="review-likes">
                                    <i class="fa-solid fa-heart"></i>
<!--                                    <span>600</span>-->
                                    <span><?= $review->getLikesNumber(); ?></span>
                                </div>
                                <div class="review-comments">
                                    <i class="fa-solid fa-square-minus"></i>
                                    <span><?= $review->getDislikesNumber(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>
        </main>

    </div>

</body>

<template id="review-template">
<div class="review" id="">
    <img src="">
    <div class="description-container">
        <div class="review-description">
            <h2>title</h2>
            <p>description</p>
            <div class="social-section">
                <div class="review-likes">
                    <i class="fa-solid fa-heart"></i>
                    <span>0</span>
                </div>
                <div class="review-comments">
                    <i class="fa-solid fa-square-minus"></i>
                    <span>0</span>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
