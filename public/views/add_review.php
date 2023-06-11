<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="public/css/page_add_review/section_add_review.css">
    <script src="https://kit.fontawesome.com/36e2e0d045.js" crossorigin="anonymous"></script>
    <title>Add Review</title>

</head>
<body>
    <div class="base-container">
        <nav>
            <img class="logo-img" src="public/img/logo-no-background.svg">
            <ul>
                <li>
                    <a href='#' class="nav-button">
                        <i class="fa-solid fa-rectangle-list"></i>
                        <span class="nav-button-text">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href='#' class="nav-button">
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
                    <form class="search-form">
                        <input class="search-input" type="text" placeholder="Search reviews">
                    </form>

                </div>
                <div class="page-option">
                    <a href='#' class="nav-button">
                        <i class="fa-solid fa-plus active"></i>
                        <span class="nav-button-text">Add review</span>
                    </a>

                </div>

            </header>
            <section class="add-review">
                <h1 class="text">Create Your review!</h1>
                <form action="add_review" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input name="title" type="text" placeholder="Review title">
                    <textarea name="description" rows=5 placeholder="Review Description"></textarea>

                    <label class="file-loader">
                        <i class="fa fa-file-arrow-up active"></i>
                        <input type="file" name="file">

<!--                        <span class="text">Load product's image</span>-->
                    </label>

<!--                    <input type="file" name="file"><br/>-->
                    <button type="submit">
                        <h3 class="text">Publish the review!</h3>
                        <img src="public/img/button.jpg" alt="Send button image">
                    </button>
                </form>
            </section>
        </main>

    </div>

</body>
