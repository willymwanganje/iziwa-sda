<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Matangazo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matangazo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kichwa_cha_habari')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aina_ya_tangazo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarehe_ya_tangazo')->input('date') ?>

    <?= $form->field($model, 'muda_mwisho_kuonekana')->input('date') ?>

    <?= $form->field($model, 'aliyeweka_id')->textInput(['readonly' => true, 'value' => Yii::$app->user->identity->id]) ?>

    <?= $form->field($model, 'imechapishwa')->checkbox() ?>

    <?= $form->field($model, 'maelezo')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ongeza' : 'Sasisha', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
