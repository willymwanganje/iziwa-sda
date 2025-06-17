<?php
use yii\helpers\Html;

$this->title = 'Sasisha Tangazo: ' . $model->kichwa_cha_habari;
$this->params['breadcrumbs'][] = ['label' => 'Matangazo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kichwa_cha_habari, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sasisha';
?>

<div class="matangazo-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>
