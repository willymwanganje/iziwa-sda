<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var \yii\web\View $this */
/** @var string $content */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 40px;
            color: #eee;

            /* Background image added here */
            background-image: url('<?= Url::to('@web/picha/kanisa1.jpg') ?>');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            /* Optional: make background image semi-transparent with overlay (if you want) */
            position: relative;
            z-index: 0;
        }

        /* Optional overlay to darken background for readability */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.0); /* adjust opacity as needed */
            z-index: -1;
        }

        /* IZIWA SDA big H2 */
        h2.nav-brand {
            font-weight: 900;
            font-size: 4rem;
            color: #007bff; /* Blue base */
            margin-bottom: 0;
            cursor: pointer;
            text-shadow:
                3px 3px 0 #ffeb3b,
                6px 6px 10px #fdd835,
                9px 9px 15px #fbc02d,
                12px 12px 20px #f9a825,
                15px 15px 25px #f57f17;
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }

        h2.nav-brand:hover {
            color: #3399ff;
            text-shadow:
                0 0 20px #fff176,
                0 0 40px #ffeb3b,
                0 0 60px #fdd835,
                0 0 80px #fbc02d,
                0 0 100px #f9a825,
                0 0 120px #f57f17;
        }

        /* Home, About, Contact as H3 with same style but smaller */
        h3.nav-link {
            font-weight: 900;
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 0;
            cursor: pointer;
            text-shadow:
                2px 2px 0 #ffeb3b,
                4px 4px 8px #fdd835,
                6px 6px 12px #fbc02d;
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }

        h3.nav-link:hover {
            color: #3399ff;
            text-shadow:
                0 0 15px #fff176,
                0 0 30px #ffeb3b,
                0 0 45px #fdd835;
        }

        nav {
            display: flex;
            gap: 50px;
            align-items: center;
            padding-left: 30px;
        }

        main.container {
            margin-top: 50px;
        }

        footer {
            background: #212529;
            color: #ccc;
            text-align: center;
            padding: 20px 0;
            margin-top: 80px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<nav>
    <a href="<?= Yii::$app->homeUrl ?>" style="text-decoration:none;"><h2 class="nav-brand">IZIWA SDA CHURCH MANAGEMENT SYSTEM</h2></a>
    <a href="<?= Yii::$app->homeUrl ?>" style="text-decoration:none;"><h3 class="nav-link">Home</h3></a>
    <a href="<?= \yii\helpers\Url::to(['/site/about']) ?>" style="text-decoration:none;"><h3 class="nav-link">About</h3></a>
    <a href="<?= \yii\helpers\Url::to(['/site/contact']) ?>" style="text-decoration:none;"><h3 class="nav-link">Contact</h3></a>
</nav>

<main class="container">
    <?= $content ?>
</main>

<footer>
    &copy; <?= date('Y') ?> IZIWA SDA Church. All rights reserved.
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
