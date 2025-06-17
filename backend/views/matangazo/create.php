<?php
use yii\helpers\Html;

$this->title = 'Ongeza Tangazo';
$this->params['breadcrumbs'][] = ['label' => 'Matangazo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="matangazo-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>
