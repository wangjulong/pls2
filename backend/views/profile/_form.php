<?php
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var frontend\models\Profile $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="profile-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>
    <br/>
    <?php echo $form->field($model,'birthdate')->
    widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true]
    ]) ?>
    <br/>
    <?= $form->field($model, 'gender_id')->dropDownList($model->genderList,
        ['prompt' => 'Please Choose One']); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
