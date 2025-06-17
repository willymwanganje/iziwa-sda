<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $form yii\widgets\ActiveForm */
/* @var $model common\models\Matukio */
?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <?= $model->isNewRecord ? 'Ongeza Tukio Jipya' : 'Hariri Tukio' ?>
                    </h4>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <div class="mb-3">
                        <?= $form->field($model, 'jina', [
                            'template' => '<label class="form-label">{label}</label>{input}{error}',
                            'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Jina la Tukio']
                        ])->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'maelezo', [
                            'template' => '<label class="form-label">{label}</label>{input}{error}',
                            'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Maelezo ya Tukio']
                        ])->textarea(['rows' => 4]) ?>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <?= $form->field($model, 'tarehe_ya_kuanza', [
                                'template' => '<label class="form-label">{label}</label>{input}{error}',
                                'inputOptions' => ['class' => 'form-control']
                            ])->input('date') ?>
                        </div>
                        <div class="col">
                            <?= $form->field($model, 'tarehe_ya_kwisha', [
                                'template' => '<label class="form-label">{label}</label>{input}{error}',
                                'inputOptions' => ['class' => 'form-control']
                            ])->input('date') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'picha', [
                            'template' => '<label class="form-label">{label}</label>{input}{error}',
                            'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Jina la picha mfano: tukio1.jpg']
                        ])->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="d-grid">
                        <?= Html::submitButton(
                            $model->isNewRecord ? '<i class="bi bi-plus-circle"></i> Hifadhi' : '<i class="bi bi-save"></i> Hifadhi Mabadiliko',
                            ['class' => 'btn btn-success btn-lg', 'encode' => false]
                        ) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>