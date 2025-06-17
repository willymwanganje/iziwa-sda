<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background: url('<?= Url::to('@web/picha/kanisa4.jpg', true) ?>') no-repeat center center fixed;
        background-size: cover;
        background-color: #f0f2f5;
    }

    .overlay-container {
        background-color: rgba(255, 255, 255, 0.55);
        min-height: 100vh;
        padding-top: 30px;
        padding-bottom: 60px;
    }

    .search-bar-wrapper {
        position: sticky;
        top: 0;
        background: #ffffff;
        padding: 20px 15px;
        z-index: 999;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .search-bar-wrapper form {
        max-width: 700px;
        margin: 0 auto;
    }

    .dashboard-header {
        text-align: center;
        margin: 40px 0 30px;
        color: #003366;
        font-size: 2.5rem;
        font-weight: 800;
    }

    .dashboard-card {
        background: linear-gradient(135deg, #ffffff, #f9f9f9);
        border: 1px solid #e0e0e0;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 25px;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .dashboard-card-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 15px;
    }

    .dashboard-card-description {
        color: #555;
        font-size: 1rem;
        line-height: 1.6;
        flex-grow: 1;
    }

    .dashboard-btn {
        margin-top: 20px;
        border-radius: 30px;
        background: #003366;
        color: white;
        padding: 10px 22px;
        text-decoration: none;
        font-weight: 600;
        text-align: center;
        transition: background 0.3s ease, transform 0.2s ease;
        display: inline-block;
    }

    .dashboard-btn:hover {
        background: #005599;
        transform: scale(1.05);
        color: white;
    }

    .container .row {
        justify-content: center;
    }
</style>

<div class="overlay-container">
    <div class="search-bar-wrapper">
        <?= Html::beginForm(['matukio/index'], 'get', ['class' => 'd-flex']) ?>
            <?= Html::textInput('MatukioSearch[jina]', Yii::$app->request->get('MatukioSearch')['jina'] ?? '', [
                'class' => 'form-control me-2',
                'placeholder' => '🔍 Tafuta Tukio...',
            ]) ?>
            <?= Html::submitButton('Tafuta', ['class' => 'btn btn-primary']) ?>
        <?= Html::endForm() ?>
    </div>

    <div class="container">
        <div class="dashboard-header">
            📅 Matukio ya Kanisa
        </div>

        <div class="row g-4">
            <?php foreach ($dataProvider->getModels() as $m): ?>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="dashboard-card w-100">
                        <div class="dashboard-card-title"><?= Html::encode($m->jina) ?></div>
                        <div class="dashboard-card-description">
                            <?= Html::encode(\yii\helpers\StringHelper::truncateWords($m->maelezo, 25)) ?>
                        </div>
                        <a href="<?= Url::to(['matukio/view', 'id' => $m->id]) ?>" class="dashboard-btn">📖 Soma Zaidi</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
