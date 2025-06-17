<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/** @var yii\data\ActiveDataProvider $dataProvider */
$matangazos = $dataProvider->getModels();
?>

<div class="container my-5">
    <h1 class="mb-4 text-center text-primary fw-bold">Matangazo ya Kanisa</h1>

    <div class="row g-4">
        <?php foreach ($matangazos as $tangazo): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <div class="card-header bg-success text-white text-center rounded-top-4">
                        <h5 class="card-title mb-0"><?= Html::encode($tangazo->kichwa_cha_habari) ?></h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted small mb-2">
                            <i class="bi bi-calendar-event"></i>
                            <?= Yii::$app->formatter->asDate($tangazo->tarehe_ya_tangazo, 'php:d M Y') ?>
                        </p>
                        <p class="mb-3 text-secondary fst-italic">
                            Aina: <?= Html::encode($tangazo->aina_ya_tangazo) ?>
                        </p>
                        <p class="text-truncate" style="flex-grow:1;">
                            <?= Html::encode($tangazo->maelezo) ?>
                        </p>
                        <a href="<?= Url::to(['matangazo/view', 'id' => $tangazo->id]) ?>" class="btn btn-outline-success mt-auto align-self-start rounded-pill px-4">
                            Soma Zaidi
                        </a>
                    </div>
                    <div class="card-footer text-muted small text-center rounded-bottom-4">
                        Imechapishwa: <?= $tangazo->imechapishwa ? '<span class="badge bg-success">Ndiyo</span>' : '<span class="badge bg-danger">Hapana</span>' ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mt-5 d-flex justify-content-center">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'maxButtonCount' => 5,
            'options' => ['class' => 'pagination pagination-lg'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledPageCssClass' => 'disabled',
            'activePageCssClass' => 'active',
        ]) ?>
    </div>
</div>
