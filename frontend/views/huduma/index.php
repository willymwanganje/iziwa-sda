<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Huduma[] $hudumaList */

$this->title = 'Huduma Zetu';

// URL ya picha ya background (hakikisha picha ipo frontend/web/images/background.jpg)
$backgroundUrl = Url::to('@web/picha/kanisa1.jpg');
?>

<style>
    body {
        background: #f0f4f8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        position: relative;
        max-width: 1140px;
        margin: 4rem auto 6rem auto;
        padding: 3rem 2rem;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        color: #2c3e50;
        overflow: hidden;
        background-color: rgba(255, 255, 255, 0.0);
        /* background-image ni positioned absolutely chini ili iwe transparent */
    }

    /* Background image positioned absolutely with low opacity */
    .container::after {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: url("<?= $backgroundUrl ?>");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        opacity: 0.9;  /* Hii ni transparency ya background picha */
        border-radius: 15px;
        z-index: 0;
        pointer-events: none;
    }

    /* Ensure content is above background image */
    .container > * {
        position: relative;
        z-index: 1;
    }

    h1 {
        font-weight: 700;
        font-size: 3rem;
        margin-bottom: 2.5rem;
        text-align: center;
        color: #003366; /* deep blue */
        text-shadow: 2px 2px 4px rgba(255, 206, 0, 0.8); /* subtle yellow shadow */
    }

    /* Dashboard card styles */
    .dashboard-card {
        border: none;
        border-radius: 20px;
        background: #ffffffcc; /* semi-transparent white */
        box-shadow:
            0 8px 20px rgba(0, 0, 0, 0.1),
            0 0 15px rgba(255, 206, 0, 0.8); /* yellow glow */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 1.8rem 1.5rem;
    }

    .dashboard-card:hover {
        transform: translateY(-8px);
        box-shadow:
            0 12px 25px rgba(0, 0, 0, 0.15),
            0 0 25px rgba(255, 206, 0, 0.9);
    }

    .dashboard-card h5 {
        font-weight: 700;
        font-size: 1.6rem;
        color: #003366; /* deep blue */
        margin-bottom: 1rem;
        text-shadow: 1px 1px 2px rgba(255, 206, 0, 0.6);
    }

    .dashboard-card p {
        font-size: 1rem;
        color: #555;
        min-height: 70px;
    }

    .dashboard-card .btn-primary {
        background-color: #003366;
        border-color: #003366;
        box-shadow: 0 0 10px rgba(255, 206, 0, 0.6);
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .dashboard-card .btn-primary:hover {
        background-color: #001f4d;
        border-color: #001f4d;
        box-shadow: 0 0 15px rgba(255, 206, 0, 0.9);
    }

    /* Responsive */
    @media (max-width: 767px) {
        h1 {
            font-size: 2.4rem;
            margin-bottom: 2rem;
        }
        .dashboard-card p {
            min-height: auto;
        }
    }
</style>

<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row mb-4">
        <div class="col-md-4 mx-auto">
            <div class="dashboard-card text-center">
                <h5>Jumla ya Huduma</h5>
                <p class="display-4"><?= count($hudumaList) ?></p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <?php foreach ($hudumaList as $huduma): ?>
            <div class="col-md-4">
                <div class="dashboard-card">
                    <h5><?= Html::encode($huduma->jina) ?></h5>
                    <p><?= Html::encode($huduma->maelezo) ?></p>
                    <?= Html::a('Tazama Maelezo', ['huduma/view', 'id' => $huduma->id], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
