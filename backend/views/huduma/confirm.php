<?php
use yii\helpers\Html;

/** @var $id integer */
/** @var $action string */
?>

<h3>Una uhakika unataka kufuta huduma hii?</h3>

<?= Html::beginForm(['huduma/delete', 'id' => $id], 'post') ?>
    <?= Html::hiddenInput('confirm', 'yes') ?>
    
    <div class="form-group">
        <?= Html::submitButton('Ndio, Futa', ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Hapana, Rudi', ['huduma/index'], ['class' => 'btn btn-secondary']) ?>
    </div>
<?= Html::endForm() ?>
