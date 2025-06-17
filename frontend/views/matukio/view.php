<?php
use yii\helpers\Html;

/* @var $model common\models\Matukio */
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card border-0 shadow-lg overflow-hidden rounded-4">

                <!-- Picha ya juu ya tukio -->
                <?php if ($model->picha): ?>
                    <div style="height: 300px; overflow: hidden;">
                        <img src="<?= Yii::getAlias('@web/uploads/') . $model->picha ?>"
                             alt="<?= Html::encode($model->jina) ?>"
                             class="w-100"
                             style="object-fit: cover; height: 100%;">
                    </div>
                <?php endif; ?>

                <div class="card-body p-4">
                    <!-- Back button -->
                    <?= Html::a('⬅️ Rudi kwenye Orodha ya Matukio', ['index'], [
                        'class' => 'btn btn-outline-primary mb-4',
                        'style' => 'border-radius: 30px; font-weight: bold;'
                    ]) ?>

                    <!-- Title -->
                    <h2 class="text-center text-primary fw-bold mb-3">
                        <?= Html::encode($model->jina) ?>
                    </h2>

                    <!-- Dates -->
                    <div class="d-flex justify-content-center mb-4 gap-3">
                        <div class="text-center">
                            <div class="badge bg-info text-dark p-2 px-3 fs-6">
                                <i class="bi bi-calendar-event"></i> Mwanzo: <?= Html::encode($model->tarehe_ya_kuanza) ?>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="badge bg-success p-2 px-3 fs-6">
                                <i class="bi bi-calendar-check-fill"></i> Mwisho: <?= Html::encode($model->tarehe_ya_kwisha) ?>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="text-muted fs-5 lh-lg" style="text-align: justify;">
                        <?= nl2br(Html::encode($model->maelezo)) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
