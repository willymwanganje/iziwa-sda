<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $searchModel common\models\MatukioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Orodha ya Matukio</h4>
                    <?= Html::a('Ongeza Tukio', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="card-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions' => ['class' => 'table table-striped table-bordered align-middle'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'jina',
                            'maelezo:ntext',
                            'tarehe_ya_kuanza',
                            'tarehe_ya_kwisha',
                            //'picha', // Ondoa hii kama hutaki column ya picha
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Chaguzi',
                                'headerOptions' => ['class' => 'text-center'],
                                'contentOptions' => ['class' => 'text-center'],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>