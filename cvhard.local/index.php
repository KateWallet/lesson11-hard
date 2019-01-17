<?php
$connection = new PDO('mysql:host=localhost; dbname=academy; charset=utf8', 'root', '');

$profile = $connection->query('SELECT * FROM `profile`');
$profile = $profile->fetchAll();

$education = $connection->query('SELECT * FROM `education` ORDER BY yearEnd DESC');

$languages = $connection->query('SELECT * FROM `languages`');

$interests = $connection->query('SELECT * FROM `interests`');

$experiences = $connection->query('SELECT * FROM `experiences` ORDER BY yearEnd DESC');

$projects = $connection->query('SELECT * FROM `projects`');

$skills = $connection->query('SELECT * FROM `skills`');

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Responsive Resume/CV Template for Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="wrapper">
    <div class="sidebar-wrapper">
        <div class="profile-container">
<!--            <img class="profile" src="assets/images/" alt="" />-->
            <h1 class="name"><?= $profile[0]['name'] ?></h1>
            <h3 class="tagline"><?= $profile[0]['post'] ?></h3>
        </div><!--//profile-container-->

        <div class="contact-container container-block">
            <ul class="list-unstyled contact-list">
                <li class="email"><i class="fa fa-envelope"></i><a href="mailto: <?=$profile[0]['email']?>"><?=$profile[0]['email']?></a></li>
                <li class="phone"><i class="fa fa-phone"></i><a href="<?=$profile[0]['phone']?>"><?=$profile[0]['phone']?></a></li>
                <li class="website"><i class="fa fa-globe"></i><a href="<?=$profile[0]['site']?>" target="_blank"><?=$profile[0]['site']?></a></li>
<!--                <li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank">linkedin.com/in/alandoe</a></li>-->
<!--                <li class="github"><i class="fa fa-github"></i><a href="#" target="_blank">github.com/username</a></li>-->
<!--                <li class="twitter"><i class="fa fa-twitter"></i><a href="https://twitter.com/3rdwave_themes" target="_blank">@twittername</a></li>-->
            </ul>
        </div><!--//contact-container-->
        <div class="education-container container-block">
            <h2 class="container-block-title">Образование</h2>
            <? foreach($education as $step) { ?>
            <div class="item">
                <h4 class="degree"><?= $step['specialty'] ?></h4>
                <h5 class="meta"><?= $step['title'] ?></h5>
                <div class="time"><?= $step['yearStart'] ?> - <?= $step['yearEnd'] ?></div>
            </div><!--//item-->
            <? } ?>
        </div><!--//education-container-->

        <div class="languages-container container-block">
            <h2 class="container-block-title">Языки</h2>
            <ul class="list-unstyled interests-list">
                <? foreach($languages as $language) { ?>
                <li><?= $language['title'] ?> <span class="lang-desc"><?= $language['level'] ?></span></li>
                <? } ?>
            </ul>
        </div><!--//interests-->

        <div class="interests-container container-block">
            <h2 class="container-block-title">Интересы</h2>
            <ul class="list-unstyled interests-list">
                <? foreach($interests as $interest) { ?>
                <li><?= $interest['interests'] ?></li>
                <? } ?>
            </ul>
        </div><!--//interests-->

    </div><!--//sidebar-wrapper-->

    <div class="main-wrapper">

        <section class="section summary-section">
            <h2 class="section-title"><i class="fa fa-user"></i>Обо мне</h2>
            <div class="summary">
                <p>О качестве моей работы можно судить по проектам в портфолио. Помимо навыков работы с HTML и CSS, есть навыки работы с JavaScript, PHP, NodeJS, JQuery - пишу скрипты. В работе использую SASS, Git (по необxодимости). Могу использовать как Bootstrap, Flexbox-верстку (последнее для меня является предпочтительнее в работе), так и строчно-блочную верстку. Так же делаю PixelPerfect-верстку.
                    Пишу код чистый и читабельный. Верстаю адаптивно и валидно, верстку оптимизирую. Подключаю аналитику для сайта. Работаю с xостингом и доменом. В результате получается красивый и рабочий сайт без ошибок и недоработок.
                </p>
            </div><!--//summary-->
        </section><!--//section-->

        <section class="section experiences-section">
            <h2 class="section-title"><i class="fa fa-briefcase"></i>Опыт работы</h2>
            <? foreach($experiences as $experience) { ?>
            <div class="item">
                <div class="meta">
                    <div class="upper-row">
                        <h3 class="job-title"><?= $experience['title'] ?></h3>
                        <div class="time"><?= $experience['yearStart'] ?> - <?= $experience['yearEnd'] ?></div>
                    </div><!--//upper-row-->
                    <div class="company"><?= $experience['company'] ?>, <?= $experience['city'] ?></div>
                </div><!--//meta-->
            <? } ?>
        </section> <!--//section-->

        <section class="section projects-section">
            <h2 class="section-title"><i class="fa fa-archive"></i>Проекты</h2>
            <div class="intro">
                <p>Здесь представлены последние, выполненные мной, работы.</p>
            </div><!--//intro-->
            <? foreach ($projects as $project) { ?>
            <div class="item">
                <span class="project-title"><a href="<?= $project['link'] ?>"><?= $project['title'] ?></a></span> - <span class="project-tagline"><?= $project['about'] ?></span>

            </div><!--//item-->
            <? } ?>
        </section><!--//section-->

        <section class="skills-section section">
            <h2 class="section-title"><i class="fa fa-rocket"></i>Профессиональные навыки</h2>
            <div class="skillset">
                <? foreach($skills as $skill) { ?>
                <div class="item">
                    <h3 class="level-title"><?= $skill['title'] ?></h3>
                    <div class="level-bar">
                        <div class="level-bar-inner" data-level="<?= $skill['level'] ?>%">
                        </div>
                    </div><!--//level-bar-->
                </div><!--//item-->
                <? } ?>
            </div>
        </section><!--//skills-section-->

<!--        <form action="" method="POST">-->
<!--            <textarea name="comment" placeholder="Оставить отзыв"></textarea>-->
<!--            <button>Отправить отзыв</button>-->
<!--        </form>-->

<!--    --><?// if ($_POST['comment']) {
//        $comment = $_POST['comment'];
//        $connection->query("INSERT INTO `comments` (`comment`) VALUES ('$comment')");
//    }
//        $commentsOfUsers = $connection->query('SELECT * FROM `comments`');
//    foreach ($commentsOfUsers as $comment) {
//    ?>
<!---->
<!--    <div>-->
<!--        --><?//= $comment['id'] ?><!--.-->
<!--        --><?//= $comment['comment'] ?>
<!--    </div>-->
<!---->
<!--    --><?// } ?>
<!---->

        <form action="addcomment.php" method="POST">
            <input name="author" type="text" placeholder="Представьтесь" required><br>
            <textarea name="comment" placeholder="Оставьте комментарий" cols="30" rows="10" required></textarea> <br>
            <button>Отправить отзыв</button>
        </form>

        <?
        $commentsOfUsers = $connection->query("SELECT * FROM `comments` WHERE moderation='ok' ORDER by date DESC");
        foreach ($commentsOfUsers as $comment) {
//            $number;
            ?>

            <div style="font-size:35px; margin: auto;">
                <?= $comment['id'] ?>.
                <?= $comment['date'] ?>
                <span style="font-size:30px; text-transform: uppercase; margin:auto; margin-right: 5px; margin-left: 5px; color:#6e3852 ">
                <?= $comment['name'] ?>
                </span>:
                "<?= $comment['comment'] ?>"
            </div>

            <?php
        }
        ?>

    </div><!--//main-body-->
</div>

<!-- Javascript -->
<script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- custom js -->
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>

