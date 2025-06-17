<?php
// backend/views/huduma/index.php

use yii\helpers\Html;
use yii\grid\GridView;

$title = 'Huduma Zote';

?>
<h1><?= Html::encode($title) ?></h1>
<p>
    <?= Html::a('Ongeza Huduma', ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Ongeza Column', ['add-column'], ['class' => 'btn btn-primary']) ?>
</p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'jina',
        'maelezo',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>