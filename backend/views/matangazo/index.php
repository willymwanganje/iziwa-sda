<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Matangazo';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="matangazo-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ongeza Tangazo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kichwa_cha_habari',
            'aina_ya_tangazo',
            'tarehe_ya_tangazo',
            'muda_mwisho_kuonekana',
            [
                'attribute' => 'aliyeweka_id',
                'label' => 'Aliyeweka',
                'value' => function($model) {
                    return $model->aliyeweka ? $model->aliyeweka->jina_la_admin : '(Haijafahamika)';
                }
            ],
            [
                'attribute' => 'imechapishwa',
                'format' => 'boolean',
            ],
            'maelezo:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
