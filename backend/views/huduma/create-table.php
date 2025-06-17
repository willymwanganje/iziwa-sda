<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$title = 'Unda Jedwali Jipya';
?>

<h1><?= Html::encode($title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'table_name')->textInput(['placeholder' => 'mf: huduma_nyuma']) ?>

<hr>

<div id="columns-area">
    <h4>Columns</h4>
    <div class="column-row">
        <input type="text" name="CreateTableForm[columns][0][name]" placeholder="Jina la column" required>
        <select name="CreateTableForm[columns][0][type]" required>
            <option value="string">String</option>
            <option value="text">Text</option>
            <option value="integer">Integer</option>
            <option value="boolean">Boolean</option>
        </select>
    </div>
</div>

<button type="button" onclick="addColumn()">Ongeza Column</button>

<br><br>

<div class="form-group">
    <?= Html::submitButton('Unda Jedwali', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

<script>
let colIndex = 1;
function addColumn() {
    const area = document.getElementById('columns-area');
    const div = document.createElement('div');
    div.classList.add('column-row');

    div.innerHTML = `
        <input type="text" name="CreateTableForm[columns][${colIndex}][name]" placeholder="Jina la column" required>
        <select name="CreateTableForm[columns][${colIndex}][type]" required>
            <option value="string">String</option>
            <option value="text">Text</option>
            <option value="integer">Integer</option>
            <option value="boolean">Boolean</option>
        </select>
    `;

    area.appendChild(div);
    colIndex++;
}
</script>
