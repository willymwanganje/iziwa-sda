<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="huduma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maelezo')->textarea(['rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton('Hifadhi', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
