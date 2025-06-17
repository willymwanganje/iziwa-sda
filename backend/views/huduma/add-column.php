<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$title = 'Ongeza Column Mpya';
?>

<h2><?= Html::encode($title) ?></h2>

<div class="column-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'column_name')->textInput() ?>

    <?= $form->field($model, 'data_type')->dropDownList([
        'string' => 'String',
        'text' => 'Text',
        'integer' => 'Integer',
        'boolean' => 'Boolean',
    ]) ?>

    <?= Html::hiddenInput('confirm', 'yes') ?>

    <div class="form-group">
        <?= Html::submitButton('Ongeza Column', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
