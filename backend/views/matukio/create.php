<?php
use yii\helpers\Html;

/* @var $model common\models\Matukio */
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Ongeza Tukio</h4>
                </div>
                <div class="card-body">
                    <?php
                    // Render _form kwa muonekano wa kisasa
                    echo Yii::$app->controller->renderPartial('_form', [
                        'model' => $model,
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>