<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Kjh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kjh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'qh')->textInput() ?>

    <?= $form->field($model, 'bai')->textInput() ?>

    <?= $form->field($model, 'shi')->textInput() ?>

    <?= $form->field($model, 'ge')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
