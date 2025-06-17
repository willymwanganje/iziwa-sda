<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var common\models\Matangazo $model */
?>

<div class="container my-5">
    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-header bg-success text-white rounded-top-4">
            <h2 class="fw-bold mb-0"><?= Html::encode($model->kichwa_cha_habari) ?></h2>
        </div>
        <div class="card-body">
            <p class="text-muted small mb-1">
                <i class="bi bi-calendar3"></i> <?= Yii::$app->formatter->asDate($model->tarehe_ya_tangazo, 'php:d M Y') ?>
                &nbsp;|&nbsp;
                Imeandaliwa na: <?= Html::encode($model->aliyeweka->jina_la_admin ?? 'Haijafahamika') ?>
            </p>
            <p class="lead fst-italic mt-4">
                <?= nl2br(Html::encode($model->maelezo)) ?>
            </p>
        </div>
        <div class="card-footer bg-light rounded-bottom-4 d-flex justify-content-between align-items-center">
            <a href="<?= Url::to(['matangazo/index']) ?>" class="btn btn-outline-success rounded-pill px-4">
                Rudi Matangazo
            </a>
            <span class="text-muted small">
                Imechapishwa: <?= $model->imechapishwa ? '<span class="badge bg-success">Ndiyo</span>' : '<span class="badge bg-danger">Hapana</span>' ?>
            </span>
        </div>
    </div>
</div>
