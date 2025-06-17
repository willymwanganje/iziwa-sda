<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Huduma $model */

$this->title = $model->jina;
?>

<style>
.container {
    max-width: 700px;
    margin: 3rem auto;
    background: #fff9fb;
    padding: 2rem 3rem;
    border-radius: 25px;
    box-shadow: 0 8px 30px rgba(214, 51, 108, 0.2);
    font-family: 'Poppins', sans-serif;
    color: #34495e;

    /* Background image */
    background-image: url('<?= Url::to('@web/picha/kanisa1.jpg') ?>');
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;

    /* Transparency overlay using RGBA */
    position: relative;
    z-index: 1;
}

/* Add a transparent overlay so text is readable */
.container::before {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(255, 255, 255, 0.85); /* White transparent overlay */
    border-radius: 25px;
    z-index: -1;
}

h1 {
    color: #d6336c;
    text-align: center;
    margin-bottom: 1.5rem;
    font-weight: 700;
    position: relative;
    z-index: 2;
}

p {
    font-size: 1.1rem;
    line-height: 1.7;
    white-space: pre-line;
    position: relative;
    z-index: 2;
}

.btn-back {
    display: inline-block;
    margin-top: 2rem;
    background-color: #d6336c;
    color: white;
    padding: 0.7rem 1.5rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
    position: relative;
    z-index: 2;
}

.btn-back:hover {
    background-color: #a82956;
    color: white;
    text-decoration: none;
}
</style>

<div class="container">
    <h1><?= Html::encode($model->jina) ?></h1>
    <p><?= nl2br(Html::encode($model->maelezo)) ?></p>
    <?= Html::a('⬅️ Rudi kwenye orodha', ['index'], ['class' => 'btn-back']) ?>
</div>
