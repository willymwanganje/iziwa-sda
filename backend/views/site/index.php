<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<!-- ...existing code for styles and slideshow... -->

<div class="site-index">

    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <h1 class="display-4 text-primary">
            ⛪ Karibu kwenye Mfumo wa Kanisa
        </h1>
        <p class="fs-5 fw-light">
            Kanisa la Waadventista Wasabato Iduda 🙏
        </p>
    </div>

    <div class="body-content">

        <div class="row text-center">
            <!-- Card ya Matukio -->
            <div class="col-lg-4 mb-4">
                <a href="<?= Url::to(['matukio/index']) ?>" class="dashboard-link">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div style="font-size: 4rem;">📅</div>
                            <h2 class="card-title mt-3">Matukio</h2>
                            <p>Matukio yajayo na maandalizi ya kanisa.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card ya Huduma -->
            <div class="col-lg-4 mb-4">
                <a href="<?= Url::to(['huduma/index']) ?>" class="dashboard-link">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div style="font-size: 4rem;">🛐</div>
                            <h2 class="card-title mt-3">Huduma</h2>
                            <p>Orodha ya huduma mbalimbali za kanisa.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card ya Matangazo (imeongezwa) -->
            <div class="col-lg-4 mb-4">
                <a href="<?= Url::to(['matangazo/index']) ?>" class="dashboard-link">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div style="font-size: 4rem;">📢</div>
                            <h2 class="card-title mt-3">Matangazo</h2>
                            <p>Angalia na simamia matangazo ya kanisa.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Unaweza kuongeza cards nyingine hapa kama unavyotaka -->

        </div>

        <!-- Button ya Login kwa user -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <?php if (Yii::$app->user->isGuest): ?>
                    <?= Html::a('Ingia kwenye Mfumo', ['/site/login'], ['class' => 'btn btn-primary btn-lg']) ?>
                <?php else: ?>
                    <?= Html::a('Toka', ['/site/logout'], [
                        'class' => 'btn btn-danger btn-lg',
                        'data-method' => 'post'
                    ]) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
