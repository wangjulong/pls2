<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kjh */

$this->title = 'Update Kjh: ' . ' ' . $model->qh;
$this->params['breadcrumbs'][] = ['label' => 'Kjhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->qh, 'url' => ['view', 'id' => $model->qh]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kjh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
