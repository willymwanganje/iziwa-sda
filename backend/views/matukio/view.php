
<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $model common\models\Matukio */
?>
<div class="matukio-view">

    <h1><?= Html::encode($model->jina) ?></h1>

    <p>
        <?= Html::a('Hariri', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Futa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Una uhakika unataka kufuta tukio hili?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Orodha', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'jina',
            'maelezo:ntext',
            'tarehe_ya_kuanza',
            'tarehe_ya_kwisha',
            // 'picha', // Ondoa hii kama hutaki column ya picha
        ],
    ]) ?>

</div>