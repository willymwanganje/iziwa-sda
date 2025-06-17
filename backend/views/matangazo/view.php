<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->kichwa_cha_habari;
$this->params['breadcrumbs'][] = ['label' => 'Matangazo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="matangazo-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Sasisha', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Futa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Una uhakika unataka kufuta tangazo hili?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kichwa_cha_habari',
            'aina_ya_tangazo',
            'tarehe_ya_tangazo',
            'muda_mwisho_kuonekana',
            [
                'label' => 'Aliyeweka',
                'value' => $model->aliyeweka ? $model->aliyeweka->jina_la_admin : '(Haijafahamika)',
            ],
            [
                'attribute' => 'imechapishwa',
                'format' => 'boolean',
            ],
            'maelezo:ntext',
        ],
    ]) ?>
</div>
